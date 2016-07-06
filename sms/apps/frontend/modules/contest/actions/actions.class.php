<?php

/**
 * contest actions.
 *
 * @package    sms
 * @subpackage contest
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class contestActions extends sfActions{
	private function getObjectOr404($id){
		$this->forward404Unless($contest = Doctrine_Core::getTable('Contest')->find(array($id)), sprintf('Object contest does not exist (%s).', $id));
		return $contest;
	}
	
	private function isPostOr404($request){
		$this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));	
	}
	
	public function executeIndex(sfWebRequest $request){
		$this->contests = Doctrine_Core::getTable('Contest')
		->createQuery('a')
		->execute();
	}

	public function executeNew(sfWebRequest $request){
		$this->form = new ContestForm();
		if ($request->isMethod(sfRequest::POST)){
			//echo "0 ";
			$c = $this->form->bind($request->getParameter($this->form->getName()));
			if ($this->form->isValid()){
				$c = $this->form->save();
				$t = $request->getParameter('participantGroups');
				$c->participants = PQL::create($t);
				//echo "1 ";
				$choices = $request->getParameter('choice');
				$answer  = $request->getParameter('answer');
				if (is_array($choices)){
					foreach ($choices as $ch_name){
						$ch = new ContestChoice();
						$ch->Contest = $c;
						$ch->name = $ch_name;
						$ch->save();

						if ($ch_name==$answer)
						$c->Answer = $ch;
					}
				}
				//echo "2 ";

				$r = new Responder();
				$r->name = "Notice For {$c->name} Winners";
				$r->response = $request->getParameter('winNotice');
				$r->save();
				$c->Responder = $r;

				$c->save();

				$this->setTemplate('newPost');
			} else {
				$this->setTemplate('newGet');
			}
		} else {
			$this->setTemplate('newGet');
		}
	}

	public function executeEdit(sfWebRequest $request){
		$this->forward404Unless($contest = Doctrine_Core::getTable('Contest')->find(array($request->getParameter('id'))), sprintf('Object contest does not exist (%s).', $request->getParameter('id')));
		$this->form = new ContestForm($contest);
	}

	public function executeUpdate(sfWebRequest $request){
		$this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
		$this->forward404Unless($contest = Doctrine_Core::getTable('Contest')->find(array($request->getParameter('id'))), sprintf('Object contest does not exist (%s).', $request->getParameter('id')));
		$this->form = new ContestForm($contest);

		$this->processForm($request, $this->form);

		$this->setTemplate('edit');
	}

	public function executeDelete(sfWebRequest $request){
		$request->checkCSRFProtection();

		$this->forward404Unless($contest = Doctrine_Core::getTable('Contest')->find(array($request->getParameter('id'))), sprintf('Object contest does not exist (%s).', $request->getParameter('id')));
		$contest->delete();

		$this->redirect('contest/index');
	}

	protected function processForm(sfWebRequest $request, sfForm $form){
		$form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
		if ($form->isValid())
		{
			$contest = $form->save();

			$this->redirect('contest/edit?id='.$contest->getId());
		}
	}

	public function executeResults(sfWebRequest $request){
		$contest = $this->getObjectOr404($request->getParameter('id'));
		
		$this->data = array();
		$this->choiceDetails = array();
		$n = 0;
		
		
		foreach ($contest->Choices as $ch){
			$q = Doctrine_Query::create()
				->select('count(*) as cnt')
				->from('ContestData d')
				->where('choice_id=?', $ch->id)
				->fetchArray();
			$c = $q[0]['cnt'];
			$n += $c;
			$this->data[$ch->name] = $c;
			$this->choiceDetails[$ch->name] = $c;
		}
		
		$this->details = array();
		$this->details["Contest Name"] = $contest->name;
		$this->details["Winners Count"] = $contest->winners_count;
		$this->details["Participants"] = $contest->participants;
		$this->details["Answer Count"] = $n;
		
		$this->getResponse()->addJavascript('jscharts');
	}
	
	public function executePerform(sfWebRequest $request){
		//$this->isPostOr404($request);
		$contest = $this->getObjectOr404($request->getParameter('id'));
		
		if ($contest->performed){
			return $this->renderText("Already Performed.");
		}
		
		$cor = Doctrine_Query::create()->select('*')->from('ContestData')
					->where('choice_id=?',$contest->answer_id)->execute();
		$cor_len = count($cor);
		
		$this->winners = array();
		$pw = array();
		while (count($this->winners)<min($contest->winners_count, $cor_len)){
			$r = $cor[rand(0, $cor_len-1)];
			if (array_search($r, $this->winners)===false){
				$this->winners[] = $r->Person;
				$pw[] = $r->person_id;
			}
		}
		
		if (count($this->winners)<$contest->winners_count){
			$this->warning = "Not enough participants!";
		}
		
 		SMS::send(PQL::create(array(), $pw), $contest->Responder->response);
 		
 		EMail::send($contest->participants, __("Contest Results"), 
 			"The answer for contest {$contest->name} was {$contest->Answer->name}.");
 		
		$contest->performed = true;
		$contest->save();
	}
	
	private function createDate($date, $default){
		if ($date['year']=="" || $date['month']=="" || $date['day']==""){
			switch ($default){
				case +1: return "3000-01-01 00:00:00";
				case -1: return "1000-01-01 00:00:00";
				default: return $default;
			}
		}
		$m = $date['month'];
		if ($m < 10) $m = "0$m";
		$d = $date['day'];
		if ($d < 10) $d = "0$d";
		return "{$date['year']}-$m-$d 00:00:00";
	}
	
	public function executeSearch(sfWebRequest $request){
		$this->form = new ContestSearchForm();
		$filter =  $request->getParameter('contest_filter');
		$filtered = $filter['filtered'];
		if ($filtered){
			$from = $this->createDate($filter['from'], -1);
			$to   = $this->createDate($filter['to'], +1);
			$q = Doctrine_Query::create()->from('contest c')
				->where('name LIKE ?', "%{$filter['name']}%")
				->andWhere('`start` >= ?', $from)
				->andWhere('`end` <= ?', $to);
			$this->contests = $q->execute();
			$this->setTemplate('index');
		}		
	}
	
	public function executeGetMessage(sfWebRequest $request){
		$cid = (int) $request->getParameter('subject');
		$person = Doctrine::getTable('person')->findOneByPhone($request->getParameter('from'));
		$contest = Doctrine::getTable('contest')->findOneByCode($request->getParameter('code'));
		$this->forward404Unless($contest);
		$contest->addData($cid, $person);
	}
	
}
