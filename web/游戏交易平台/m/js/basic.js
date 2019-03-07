//搜索条件框
function sertjonc(x,y){ //x表示当前ID，y表示所有的
s=document.getElementById("sertj"+x);
if(s.style.display==""){s.style.display="none";}else{s.style.display="";}
for(i=1;i<=y;i++){
if(x!=i){if(document.getElementById("sertj"+i)){document.getElementById("sertj"+i).style.display="none";}}
}
}

//等待
function tjwait(){
document.getElementById("tjbtn").style.display="none";
document.getElementById("tjing").style.display="";	
}

function gourl(x){
location.href=x;
}

//避免出现小数点多位的情况
function addNum(num1,num2){
var sq1,sq2,m;
try{sq1=num1.toString().split(".")[1].length;} catch(e){sq1=0;}
try{sq2=num2.toString().split(".")[1].length;} catch(e){sq2=0;}
m=Math.pow(10,Math.max(sq1,sq2));
return ( num1 * m + num2 * m ) / m;
}

function accMul(arg1,arg2){
 var m=0,s1=arg1.toString(),s2=arg2.toString();
 try{m+=s1.split(".")[1].length}catch(e){}
 try{m+=s2.split(".")[1].length}catch(e){}
 return Number(s1.replace(".",""))*Number(s2.replace(".",""))/Math.pow(10,m);
}
