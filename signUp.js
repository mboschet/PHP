/* Author:     Boschet Studios
   Date:       November 19, 2017
   File:       signUp.js
   Description: JavaScript to help with the signUp.html form
*/

"use strict";

function AHoptions()
{

}

function BToptions()
{
	
}

function age()
  {
    var today = new Date();
	var birthDate = new Date(getElementById("bday"));
	var age = today.getFullYear() - birthDate.getFullYear();
	var m = today.getMonth() - birthDate.getMonth();
	if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) 
    { age--; }
    
	if (age < 18)
	{
		var message = document.createElement("h1");
		var textMessage = document.createTextNode("You must be 18 to creat an account.");
		message.appendChild(textMessage);
		
		var element = document.getElementById("account");
		element.appendChild(message);
	}
  }

function createEventListerners()
{
	var isAH = document.getElementById("AH");
	if (isAH.addEventListener) {
		isAH.addEventListener("click", AHoptions, false);
	} else if (isAH.attachEvent) {
		isAH.attachEvent("onclick", AHoptions);
	}
	
	var isBT = document.getElementById("BT");
	if (isBT.addEventListener) {
		isBT.addEventListener("click", BToptions, false);
	} else if (isBT.attachEvent) {
		isBT.attachEvent("onclick", BToptions);
	}
	
	var berthDay = getElementById("bday");
	if (berthDay.addEventListener) {
		berthDay.addEventListener("change", age, false);
	} else if (berthDay.attachEvent) {
		berthDay.attachEvent("onchange", age);
	}
}

function setUpPage()
{
	createEventListerners();
}

if (window.addEventListener) {
	window.addEventListener("load", setUpPage, false);
} else if (window.attachEvent) {
	window.attachEvent("onload", setUpPage);
}