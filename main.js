//KETU FILLON JS PER SLIDER
var slider_content= document.getElementById('box');
// contain images in an array
var image = ['img/a', 'img/b', 'img/c', 'img/d'];
	
var i = image.length; //i=4
//function for next slider
function nextImage(){
	if(i<image.length){
		i=i+1;
	}
	else{
		i=1;		
	}
	slider_content.innerHTML="<img src="+image[i-1]+".png>";
}
function prewImage(){
	if(i<image.length+1){
		i=i-1;
		if(i==0){
			i=image.length;
		}
	}
	else{
		i=image.length;
	}
	slider_content.innerHTML="<img src="+image[i-1]+".png>";
}
//KETU PERFUNDON SLIDERI
 


//Shiko profilin e stafit
function shikoProfilin(pointer){
	var elements=document.getElementsByClassName("teamPersonProfili");
	if(pointer==0){
		elements[pointer].classList.remove("hidden");
		elements[pointer].classList.add("show");
	}else if(pointer==1){
		elements[pointer].classList.remove("hidden");
		elements[pointer].classList.add("show");
	}else if(pointer==2){
		elements[pointer].classList.remove("hidden");
		elements[pointer].classList.add("show");
	}else if(pointer==3){
		elements[pointer].classList.remove("hidden");
		elements[pointer].classList.add("show");
	}else{
		elements[pointer].classList.remove("hidden");
		elements[pointer].classList.add("show");
	}
}
//----------------------valido register--------------------------------

/*
var registerButton = document.getElementById('registerButton');
registerButton.addEventListener('click', validoRegister);//bind 

function validoRegister(event){
	event.preventDefault();
	var emri = document.getElementById('rname').value;
	var mbiemri = document.getElementById('rlastname').value;
	var email = document.getElementById('remail').value;
	var password = document.getElementById('rpassword').value;
	if(emri=='' || mbiemri=='' || email=='' || password==''){
		alert("Duhet te plotesohen te gjitha field-at");
	}
	else if(!validoEmrinMbiemrin(emri)){
		alert("Emri nuk eshte ne formen e duhur");
	}
	else if(!validoEmrinMbiemrin(mbiemri)){
		alert("Mbiemri nuk eshte ne formen e duhur");
	}
	
	else if(!validoEmailin(email)){
		alert("Email-i duhet te jete ne formen: example@something.something");
	}
	else if(!validoPasswordin(password)){
		alert("Password duhet te permbaj...");
	}
	else{
		alert("Regjistrimi perfundoj me sukses");
	}

}
*/
function validoRegister(){

	var emri = document.getElementById('rname').value;
	var mbiemri = document.getElementById('rlastname').value;
	var email = document.getElementById('remail').value;
	var password = document.getElementById('rpassword').value;
		
	if(emri=='' || mbiemri=='' || email=='' || password==''){
		alert("Duhet te plotesohen te gjitha field-at");
		return false;
	}
	if(!validoEmrinMbiemrin(emri)){
		alert("Emri duhet te permbaj se paku tre karaktere, te gjitha shkronja dhe te filloj me shkronje te madhe!");
		return false;
	}
	else if(!validoEmrinMbiemrin(mbiemri)){
		alert("Mbiemri duhet te permbaj se paku tre karaktere, te gjitha shkronja dhe te filloj me shkronje te madhe!");
		return false;
	}
	
	else if(!validoEmailin(email)){
		alert("Email-i duhet te jete ne formen: example@gmail.com");
		return false;
	}
	else if(!validoPasswordin(password)){
		alert("Password duhet te permbaj te pakten 8karaktere. Ku prej tyre te pakten nje shkronje e madhe, nje shkronje e vogel, nje numre dhe nje karakter special!");
		return false;
	}
	else{
		//alert("Regjistrimi perfundoj me sukses");
		return true;
	}

}
//--------------------Valido Login-------------------------------

function validoLogIn(){

	var email = document.getElementById('lemail').value;
	var password = document.getElementById('lpassword').value;
	
	
	/*if(inputet[0].value=="" || inputet[1].value==""){
		alert("Nuk keni plocuar te dhenat!");
	}
	if(inputet[1].value.length<8){
		alert("Passwordi duhet te permbaj te pakten 8 karaktere!");
	}*/
	//ket lloj forme te validimit do ta perdori te contact Us ketu do perdori regex
	
	if(email=='' || password==''){
		alert("Te gjitha field-at duhet te plotesohen");
		return false;
	}
	if(!validoEmailin(email)){
		alert("Email-i duhet te jete ne formen: example@gmail.com");
		return false;
	}
	else if(!validoPasswordin(password)){
		alert("Password duhet te permbaj te pakten 8karaktere. Ku prej tyre te pakten nje shkronje e madhe, nje shkronje e vogel, nje numre dhe nje karakter special!");
		return false;
	}
	else{
		//alert("Logimi perfundoj me sukses");
		return true;
	}

}



//--------------------valido contact us----------------------------------

function validoContactUs(){
	
	//var inputet = document.getElementsByClassName("text-input");
	var emri=document.getElementById('cuName').value;
	var mbiemri=document.getElementById('cuLastName').value;
	var email=document.getElementById('cuEmail').value;
	var country=document.getElementById('cuCountry').value;
	var subject=document.getElementById('cuSubject').value;
	
	if(emri=='' || mbiemri=='' || email=='' || country=='' || subject==''){
		alert("Duhet te plotesohen te gjitha field-at");
		return false;
	}

	if(!validoEmrinMbiemrin(emri)){
		alert("Emri duhet te permbaj se paku tre karaktere, te gjitha shkronja dhe te filloj me shkronje te madhe!");
		return false;
	}
	else if(!validoEmrinMbiemrin(mbiemri)){
		alert("Mbiemri duhet te permbaj se paku tre karaktere, te gjitha shkronja dhe te filloj me shkronje te madhe!");
		return false;
	}
	else if(!validoEmailin(email)){
		alert("Email-i duhet te jete ne formen: example@gmail.com");
		return false;
	}
	else if(subject.length<50){
		alert("Subjekti duhet te permbaj te pakten 200karaktere!");
		return false;
	}
	else{
		alert("Perfundoj me sukses");
		return true;
	}
}
//--------------------validoUserProfile----------------------------------

function validoUserProfile(){
	var emri=document.getElementById('upName').value;
	var email=document.getElementById('upEmail').value;
	var img=document.getElementById('upImg').value;

	if(emri=='' || email=='' || img==''){
		alert("Duhet te plotesohen te gjitha field-at");
		return false;
	}
	
	if(!validoEmrinMbiemrin(emri)){
		alert("Emri duhet te permbaj se paku tre karaktere, te gjitha shkronja dhe te filloj me shkronje te madhe!");
		return false;
	}
	else if(!validoEmailin(email)){
		alert("Email-i duhet te jete ne formen: example@gmail.com");
		return false;
	}
	else{
		alert("Editimi perfundoj me sukses");
		return true;
	}

}
function validoPostimin(){
	var titulli=document.getElementById('post_titulli').value;
	var body=document.getElementById('post_body').value;
	var img=document.getElementById('post_img').value;

	if(titulli=='' || body=='' || img==''){
		alert("Duhet te plotesohen te gjitha field-at!");
		return false;
	}

	if(body.length<200){
		alert("Pershkrimi duhet te permbaj te paketen 200karaktere!");
		return false;
	}else{
		alert("U postu me sukses.");
		return true;
	}
}

function validoAntarin(){
	var fullname=document.getElementById('stafi_fullname').value;
	var certifikimi=document.getElementById('stafi_certifikimi').value;
	var img=document.getElementById('stafi_img').value;
	var pershkrimi=document.getElementById('stafi_pershkrimi').value;


	if(fullname=='' || certifikimi=='' || img=='' || pershkrimi==''){
		alert("Duhet te plotesohen te gjitha field-at!");
		return false;
	}
	var reg= /^[A-Z]{1}[a-z]{2,}\s[A-Z]{1}[a-z]{2,}$/;

	if(!reg.test(fullname)){
		alert("Emri i plote duhet te plotesohet ne formen: Emri Mbiemi, ku secili duhet te kete te pakten 3karaktere te gjitha shkronja dhe te fillojne me shkronje te madhe!");
		return false;
	}else if(pershkrimi.length<200){
		alert("Pershkrimi duhet te permbaj te pakten 200 karaktere!");
		return false;
	}else{
		alert("U postu me sukses.");
		return true;
	}
}
function validoEditPost(){
	var body=document.getElementById('edit_body').value;
	var img=document.getElementById('edit_img').value;

	if(body=='' || img==''){
		alert("Duhet te plotesohen te gjitha field-at!");
		return false;
	}
	if(body.length<200){
		alert("Peshkrimi i postimit duhet te permbaj te pakten 200 karaktere!");
		return false;
	}else{
		return true;
	}
}
function validoEmailin(email){
	var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
            //var address = document.getElementById[email].value;
    return reg.test(email);
}
function validoPasswordin(pass){
	//var reg=/^(?=.*\d)(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
	var reg = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
	return reg.test(pass);
}
function validoEmrinMbiemrin(emri){
	var reg=/^[A-Z]{1}[a-z]{2,}$/;
	return reg.test(emri);
}

function editUserProfile(){
	var elements=document.getElementsByClassName("editUserProfile");
	elements[0].classList.remove("hidden");
	//elements[0].classList.add("show");
}