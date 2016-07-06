<h1>Contests List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Name</th>
      <th>Code</th>
      <th>Start</th>
      <th>End</th>
      <th>Participants</th>
      <th>Responder</th>
      <th>Winners count</th>
      <th>Answer</th>
      <th>Auto result</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($contests as $contest): ?>
    <tr>
      <td><a href="<?php echo url_for('contest/edit?id='.$contest->getId()) ?>"><?php echo $contest->getId() ?></a></td>
      <td><?php echo $contest->getName() ?></td>
      <td><?php echo $contest->getCode() ?></td>
      <td><?php echo $contest->getStart() ?></td>
      <td><?php echo $contest->getEnd() ?></td>
      <td><?php echo $contest->getParticipants() ?></td>
      <td><?php echo $contest->getResponderId() ?></td>
      <td><?php echo $contest->getWinnersCount() ?></td>
      <td><?php echo $contest->getAnswerId() ?></td>
      <td><?php echo $contest->getAutoResult() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('contest/new') ?>">New</a>
