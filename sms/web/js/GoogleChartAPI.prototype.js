/*
Google Chart API Prototype Plugin | Volume 1 Pie Charts
*/
var GoogleChart=function(){
	this.init=function(elmID){
		this.chartURL='http://chart.apis.google.com/chart?';
		this.divID=elmID;
		this.extras='';
	}
	this.setChartData=function(data,max){
		if(typeof(max)=='undefined'){max=100;}
		this.chartData=data;
		////////alert(data.length);
		this.chartDataEncoded='s:';	
		for (var i = 0; i < data.length; i++) {
			if(data.length>1){
			this.chartDataEncoded+=simpleEncode(data[i],max)+',';
			}else{
			this.chartDataEncoded+=simpleEncode(data[i],max);
			}
		}
	}
	this.setChartType=function(type){this.chartType=type;}
	this.setLabels=function(labels){this.labels=labels;}
	this.setChartSize=function(size){this.chartSize=size;}
	this.setChartColors=function(clr){this.chartColor=clr; }
	this.setChartTitle=function(title){this.chartTitle=title;}
    this.setChartGrid=function(grid){this.extras='&chg='+grid;}

	this.drawChart=function(data){
		$(this.divID).update('<img src="'+this.chartURL+'cht='+this.chartType+'&chd='+this.chartDataEncoded+'&chs='+this.chartSize+'&chl='+this.labels+'&chco='+this.chartColor+'&chtt='+this.chartTitle+this.extras+'" />');
	}
}
/* function to encode data, taken from http://code.google.com/apis/chart/#extended        */
var simpleEncoding = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
function simpleEncode(values,maxValue) {
var chartData = [''];
  for (var i = 0; i < values.length; i++) {
    var currentValue = values[i];
    if (!isNaN(currentValue) && currentValue >= 0) {
    chartData.push(simpleEncoding.charAt(Math.round((simpleEncoding.length-1) * currentValue / maxValue)));
    }
      else {
      chartData.push('_');
      }
  }
return chartData.join('');
}
