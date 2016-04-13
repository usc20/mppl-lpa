$(document).ready(function() {
    var flag1 = 0;
	var flag2 = 0;
    $("#togglemurid").click(function(){
		if(flag1==0){
			$("#muridForm").show();
			$("#guruForm").hide();
			flag1 = 1;
			flag2 = 0;
		}
    });
    $("#toggleguru").click(function(){
		if(flag2==0){
			$("#guruForm").show();
			$("#muridForm").hide();
			flag2 = 1;
			flag1 = 0;
		}
    });
});