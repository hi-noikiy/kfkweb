//��Ѷ����
var xmlHttppj = false;
try {
  xmlHttppj = new ActiveXObject("Msxml2.XMLHTTP");
} catch (e) {
  try {
    xmlHttppj = new ActiveXObject("Microsoft.XMLHTTP");
  } catch (e2) {
    xmlHttppj = false;
  }
}
if (!xmlHttppj && typeof XMLHttpRequest != 'undefined') {
  xmlHttppj = new XMLHttpRequest();
}

function newspj(x){
t=document.getElementById("pjt").value;
if(t==""){alert("��������������");document.getElementById("pjt").focus();return false;}
url = "newspj.php?bh="+x+"&pj="+escape(t);
xmlHttppj.open("get", url, true);
xmlHttppj.onreadystatechange = updatePagepj;
xmlHttppj.send(null);
}

function updatePagepj() {
 if(xmlHttppj.readyState == 4) {
 response = xmlHttppj.responseText;
 response=response.replace(/[\r\n]/g,'');
  if(response=="err1"){tangc(1);return false;}
  else if(response=="err2"){alert("��~���۹���Ƶ�������Ժ��ٷ�");return false;}
  else if(response=="ok"){location.reload();}else{alert("δ֪������ˢ������");return false;}
 }
}
