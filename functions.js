// Function for updating in the index page
function editFunc(key, numb, val = document.getElementById(key).innerHTML, check = false, type = 0)
{
	value = "false"
	try{value = document.getElementById(key).contentEditable}
	catch{console.log("Not Editable")}
  if(check === "true" || value === "true")
  {
	console.log("Sending");
	url = "update.php?k=";

	//Add the get parameters
	url = url.concat(encodeURI(key));
	url = url.concat("&v=");
	url = url.concat(encodeURI(val));
	url = url.concat("&pk=");
	url = url.concat(encodeURI(numb));
	url = url.concat("&type=");
	url = url.concat(encodeURI(type));
	console.log(url);

	//Actually interact with JSON
	fetch(url)
	  .then((response) =>{
		if (!response.ok) throw Error(response.statusText);
		console.log(response);
		return response;
	  })
	  .then((data) => {
		console.log(data);
	  })
	console.log("Success");
	document.getElementById(key).contentEditable = false;
  }
  else
  {
	console.log("Editing");
	document.getElementById(key).contentEditable = true;
  }
}

// Function for the admin to update values
function bigEditFunc(personId)
{
	//Use the name row as a litmus for editability (if it has already been edited)
	if(document.getElementById(personId.toString().concat("name")).contentEditable == "true")
	{
		//Try catch this because the tail bit would cause an error
		try
		{
			console.log(personId)
			editFunc("name", personId.toString(), document.getElementById(personId.toString().concat("name")).innerHTML, "true", 0);
		}
		catch{}
		try
		{
			editFunc("email", personId, document.getElementById(personId.toString().concat("email")).innerHTML, "true", 0);
		}
		catch{}
		try
		{
			var selector = document.getElementById(personId.toString().concat("power"));
			editFunc("power", personId, selector[selector.selectedIndex].value, "true", 0);
		}
		catch{}
		try
		{
			var selector = document.getElementById(personId.toString().concat("experience"));
			editFunc("experience", personId, selector[selector.selectedIndex].value, "true", 0);
		}
		catch{}

		document.getElementById(personId.toString().concat("name")).contentEditable = false;
		document.getElementById(personId.toString().concat("experience")).disabled = true;
		document.getElementById(personId.toString().concat("power")).disabled = true;
		document.getElementById(personId.toString().concat("email")).contentEditable = false;
	}
	else
	{
		document.getElementById(personId.toString().concat("name")).contentEditable = true;
		document.getElementById(personId.toString().concat("experience")).disabled = false;
		document.getElementById(personId.toString().concat("power")).disabled = false;
		document.getElementById(personId.toString().concat("email")).contentEditable = true;
	}
}

// Function for the admin to update news
function newsEditFunc(personId)
{
	//Use the name row as a litmus for editability (if it has already been edited)
	if(document.getElementById(personId.toString().concat("title")).contentEditable == "true")
	{
		//Try catch this because the tail bit would cause an error
		try
		{
			console.log(personId)
			editFunc("title", personId.toString(), document.getElementById(personId.toString().concat("title")).innerHTML, "true", 1);
		}
		catch{}
		try
		{
			editFunc("author", personId, document.getElementById(personId.toString().concat("author")).innerHTML, "true", 1);
		}
		catch{}
		try
		{
			editFunc("contents", personId, document.getElementById(personId.toString().concat("contents")).innerHTML, "true", 1);
		}
		catch{}
		try
		{
			var selector = document.getElementById(personId.toString().concat("Category"));
			editFunc("Category", personId, selector[selector.selectedIndex].value, "true", 1);
		}
		catch{}

		document.getElementById(personId.toString().concat("title")).contentEditable = false;
		document.getElementById(personId.toString().concat("author")).contentEditable = false;
		document.getElementById(personId.toString().concat("contents")).contentEditable = false;
		document.getElementById(personId.toString().concat("Category")).disabled = true;
	}
	else
	{
		document.getElementById(personId.toString().concat("title")).contentEditable = true;
		document.getElementById(personId.toString().concat("author")).contentEditable = true;
		document.getElementById(personId.toString().concat("contents")).contentEditable = true;
		document.getElementById(personId.toString().concat("Category")).disabled = false;
	}
}

// Function for the admin to update papers
function paperEditFunc(personId)
{
	//Use the name row as a litmus for editability (if it has already been edited)
	if(document.getElementById(personId.toString().concat("title")).contentEditable == "true")
	{
		//Try catch this because the tail bit would cause an error
		try
		{
			console.log(personId)
			editFunc("title", personId.toString(), document.getElementById(personId.toString().concat("title")).innerHTML, "true", 2);
		}
		catch{}
		try
		{
			editFunc("Author", personId, document.getElementById(personId.toString().concat("Author")).innerHTML, "true", 2);
		}
		catch{}
		try
		{
			editFunc("abstract", personId, document.getElementById(personId.toString().concat("abstract")).innerHTML, "true", 2);
		}
		catch{}
		try
		{
			var selector = document.getElementById(personId.toString().concat("Category"));
			editFunc("Project", personId, selector[selector.selectedIndex].value, "true", 2);
		}
		catch{}
		try
		{
			var selector = document.getElementById(personId.toString().concat("Loc"));
			editFunc("Location", personId, selector[selector.selectedIndex].value, "true", 2);
		}
		catch{}

		document.getElementById(personId.toString().concat("title")).contentEditable = false;
		document.getElementById(personId.toString().concat("Author")).contentEditable = false;
		document.getElementById(personId.toString().concat("abstract")).contentEditable = false;
		document.getElementById(personId.toString().concat("Category")).disabled = true;
		document.getElementById(personId.toString().concat("Loc")).disabled = true;
	}
	else
	{
		document.getElementById(personId.toString().concat("title")).contentEditable = true;
		document.getElementById(personId.toString().concat("Author")).contentEditable = true;
		document.getElementById(personId.toString().concat("abstract")).contentEditable = true;
		document.getElementById(personId.toString().concat("Category")).disabled = false;
		document.getElementById(personId.toString().concat("Loc")).disabled = false;
	}
}

// Removes an image from the news
function imgDelete(key)
{
	console.log("imgDelete Called");
	url = "delete.php?key=" + key.toString();
	//Actually interact with JSON
	fetch(url)
	  .then((response) =>{
		if (!response.ok) throw Error(response.statusText);
		console.log(response);
		return response.json();
	  })
	  .then((data) => {
		console.log(data);
	  })
}

// Adds a place to upload additional images
function addImage()
{
	console.log("Hello");
	console.log(document.getElementById("MoreImages").innerHTML);
	Document.getElementById("MoreImages").innerHTML = "Hello";
}

// Adds a person to the person paper nexus
function addPaperPerson(ind)
{
	ind = String(ind);
	console.log("Hello")
	console.log(document.getElementById(ind.concat("person")).value);
	editFunc(
		document.getElementById(ind.concat("person")).value.concat("%"),
		"",
		val = ind,
		check = "true",
		type = 4
	);
	return false;
}
