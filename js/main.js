function checkFields() {
	var phone = document.getElementById("mobile").value.replace(/\D/g, '');
	if(phone.length == 10) {
		phone = "(" + phone.substring(0, 3) + ")-" + phone.substring(3, 6) + "-" + phone.substring(6, 10);
		document.getElementById("mobile").value = phone;
	}
	if(document.getElementById("name").value === "") {
		return("Please fill out all required items!");
	} else if(document.getElementById("email").value === "") {
		return("Please fill out all required items!");
	} else if(document.getElementById("lang").value == "Select") {
		return("Please fill out all required items!");
	} else if(!(/ /).test(document.getElementById("name").value)) {
		return("Please enter a valid full name!");
	} else if(!(/.*@.*\..+/).test(document.getElementById("email").value)) {
		return("Please enter a valid email address!");
	}
	return "";
}

function submitForm() {
	if(checkFields() === "") {
		var select = document.getElementById("lang").value;
		if(select == "HTML/CSS") {
			window.open("http://live.dchacks.org/tracks/htmlcss.html", "_blank");
		} else if(select == "JavaScript") {
			window.open("http://live.dchacks.org/tracks/javascript.html", "_blank");
		} else if(select == "Ruby on Rails") {
			window.open("http://live.dchacks.org/tracks/rubyonrails.html", "_blank");
		} else if(select == "Node.js") {
			window.open("http://live.dchacks.org/tracks/nodejs.html", "_blank");
		} else if(select == "Django") {
			window.open("http://live.dchacks.org/tracks/django.html", "_blank");
		} else if(select == "PHP") {
			window.open("http://live.dchacks.org/tracks/php.html", "_blank");
		} else if(select == "iOS") {
			window.open("http://live.dchacks.org/tracks/ios.html", "_blank");
		} else if(select == "Android") {
			window.open("http://live.dchacks.org/tracks/android.html", "_blank");
		} else if(select == "Ionic") {
			window.open("http://live.dchacks.org/tracks/ionic.html", "_blank");
		} else if(select == "Corona Labs") {
			window.open("http://live.dchacks.org/tracks/corona.html", "_blank");
		} else if(select == "Git/GitHub") {
			window.open("https://www.atlassian.com/git/tutorials/", "_blank");
		} else if(select == "Debugging Tools") {
			window.open("http://getfirebug.com/", "_blank");
		}
		location.reload();
	} else {
		alert(checkFields());
	}
}

function updateLanguages() {
	var select = document.getElementById("lang");
	var length = select.options.length;
	for(i=0; i<length; i++) {
		select.remove(0);
	}
	var options = [];
	if(document.getElementById("web-dev").checked) {
		options = ["Select", "HTML/CSS", "JavaScript", "Ruby on Rails", "Node.js", "Django", "PHP"];
	} else if(document.getElementById("mobile-dev").checked) {
		options = ["Select", "iOS", "Android", "Ionic", "Corona Labs"];
	} else if(document.getElementById("other").checked) {
		options = ["Select", "Git/GitHub", "Debugging Tools"];
	}
	for(var i=0; i<options.length; i++) {
		var option = document.createElement("option");
		option.text = String(options[i]);
		option.value = String(options[i]);
		select.add(option);
	}
}

function removeSelect() {
	var select = document.getElementById("lang");
	if(select.options[0].value == "Select") select.remove[0];
}

function addOptions() {
	for(var i=1; i<=31; i++) {
		var option = document.createElement("option");
		option.text = String(i);
		option.value = String(i);
		(document.getElementById("day")).add(option);
	}
	for(var i=2015; i>=1900; i--) {
		var option = document.createElement("option");
		option.text = String(i);
		option.value = String(i);
		(document.getElementById("year")).add(option);
	}
}
addOptions();