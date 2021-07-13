
<style type="text/css">

.body2 {

	padding: 0;
	margin: 0;
	background: ;

}
/*.body2 a {
	color:red;
	transition: 0.5s all;
	-webkit-transition: 0.5s all;
	-moz-transition: 0.5s all;
	-o-transition: 0.5s all;
	-ms-transition: 0.5s all;
	text-decoration: none;
}
.body2 a:hover {
	text-decoration: none;
}
.body2 a:focus, a:hover {
	text-decoration: none;
}*/
.buttons ,.cancelb{
	transition: 0.5s all;
	-webkit-transition: 0.5s all;
	-moz-transition: 0.5s all;
	-o-transition: 0.5s all;
	-ms-transition: 0.5s all;
	display: block;
	    font-family: 'Open Sans', sans-serif;
}
h1, h2, h3, h4, h5, h6 {
	margin: 0;
	padding: 0;
	font-family: 'Raleway', sans-serif;
}
p {
	margin: 0;
	font-family: 'Open Sans', sans-serif;
}
ul {
	margin: 0;
	padding: 0;
}
li {
	list-style-type:none;
}
label {
	margin: 0;
}
/*a:focus, a:hover {
	text-decoration: none;
	outline: none;
}*/
/*-- //Reset-Code --*/

.body2{
	background: url( '{{ asset('images/5copy.jpg') }}') no-repeat;
    background-size: cover;
	min-height: 100vh;
}
.agile-login {

		padding-top: 60px;
}
.wrapper {
    width: 450px;
    margin: auto;
   /* border-radius: 20px; */
    text-align: center;
    padding: 3% 0px;
    /*background-color: rgba(255, 255, 255, 0.31);*/
    background-color: rgba(6, 5, 5, 0.33);
	webkit-box-shadow: 10px 3px 66px -19px rgba(0,0,0,0.75);
    -moz-box-shadow: 10px 3px 66px -19px rgba(0,0,0,0.75);
    box-shadow: 10px 3px 66px -19px rgba(0,0,0,0.75);
}
.w3ls-form {
    display: inline-block;
    width: 350px;
    margin: auto;
    text-align: left;
}
label, input[type="text"],select,option,textarea,.pwdfield{
    display: block;
	    font-family: 'Open Sans', sans-serif;
}
input[type="text"],select,option,textarea,.pwdfield {
    outline: 0;
    padding: 12px 15px;
    border-radius: 25px;
    border: none;
    /* background-color: rgba(31, 248, 255, 0.59); */
    background-color: rgba(87, 102, 103, 0.59);
    color: white;
	width: 100%;
	letter-spacing: 1px;
}
.agile-login h1 {
    text-align: center;
    color: #fff;
    margin-bottom: 2%;
    font-size: 45px;
    font-weight: 300;
    letter-spacing: 5px;
    text-transform: uppercase;
}
.wrapper h2 {
	margin-bottom: 30px;
    text-transform: uppercase;
    font-size: 26px;
    color: white;
    font-weight: 600;
    letter-spacing: 2px;
}
a.pass {
    font-size: 15px;
	    color: #efbb42;
		font-family: 'Open Sans', sans-serif;
		    letter-spacing: 2px;
}
.w3ls-form a {
    
}

 label {
    margin: 20px 0px 8px 15px;
    font-size: 13px;
     color: #fff;
    font-family: 'Open Sans', sans-serif;
     text-transform: uppercase;
	letter-spacing: 2px;
}
 .buttons,.cancelb{
	margin: 20px auto;
    padding: 9px 60px;
    border-radius: 25px;
    font-size: 18px;
    border: none;
    background-color: transparent;
    color: #fff;
    text-transform: uppercase;
    outline: 0;
    border: 1px solid #4f5d61;
	cursor: pointer;
	    width: 100%;
	    letter-spacing: 1px;	
}

.buttons:hover {
    color: #fff;
    background-color:  rgba(0, 245, 255, 0.69);
}
.cancelb:hover{
    color: white;
    background-color: yellow;
}
::-webkit-input-placeholder { /* Chrome/Opera/Safari */
  color: #ccc6c6;
}
::-moz-placeholder { /* Firefox 19+ */
  color: #ccc6c6;
}
:-ms-input-placeholder { /* IE 10+ */
  color: #ccc6c6;
}
:-moz-placeholder { /* Firefox 18- */
  color: #ccc6c6;
}
.error{
    color: red;
}

.agile-icons {
    padding: 3% 0px;
}
span.fa.fa-twitter:hover {
    background-color: #00b6f1;
    color: white;
}
span.fa.fa-facebook:hover {
    background-color: #3b5998;
    color: white;
}
span.fa.fa-pinterest-p:hover {
    background-color: #cb2027;
    color: white;
}
.agile-icons span.fa {
	font-size: 12px;
    margin: auto 10px;
    color: #fff;
    width: 32px;
    height: 32px;
    line-height: 32px;
    border-radius: 50%;
    background-color: rgba(243, 249, 249, 0.22);
}
.copyright p {
    text-align: center;
        padding: 15px 0px;
    color: white;
    /* background-color: rgba(35, 30, 30, 0.43); */
    margin-top: 4%;
	    letter-spacing: 2px;
		font-size: 13px;
}

/* responsive */
@media screen and (max-width: 1024px){
	
	.copyright p {
   margin-top: 0%;
}
}


@media screen and (max-width: 568px){
	.agile-login h1 {
		    font-size: 40px;
			
	}
}

@media screen and (max-width: 480px){
	body{
		background-position: center;
	}
	.agile-login {
    padding-top: 35px;
}
	.agile-login h1 {
    font-size: 35px;
    letter-spacing: 4px;
}
	.wrapper h2 {
    font-size: 26px;

}
.wrapper {
    width: 370px;
}
.copyright p {
	letter-spacing: 1px;
	
}
	
}
@media screen and (max-width: 414px){
	.agile-login h1 {
    font-size: 30px;
	letter-spacing: 3px;
	    margin-bottom: 6%;
}
.wrapper {
    width: 320px;
}
.w3ls-form {
	    width: 300px;
}
.wrapper h2 {
    font-size: 20px;
    margin-bottom: 15px;
}
.copyright p {
    padding: 10px 0px;
    font-size: 14px;
    margin-top: 6%;
}
	
}
@media screen and (max-width: 375px){
	.agile-login h1 {
    font-size: 29px;
}
	input[type="text"],select,option,.pwdfield,textarea {
		width: 90%;
	}
	label {
    margin: 20px 0px 5px 10px;
    font-size: 13px;
    color: #fff;
	}
	.copyright p {
    font-size: 13px;

}
}
@media screen and (max-width: 320px){
.w3ls-form {
    width: 270px;
}
.agile-login h1 {
    font-size: 23px;
}
.wrapper {
    width: 280px;
}
.wrapper h2 {
    font-size: 18px;
    margin-bottom: 10px;
}
.cancelb, .buttons{
    margin: 10px auto;
	    padding: 8px 60px;
}
.agile-login {
    padding-top: 30px;
}
label {
    margin: 15px 0px 5px 10px;
}

input[type="text"],textarea,select,option {
    padding: 10px 15px;
}
}
/* responsive */

</style>