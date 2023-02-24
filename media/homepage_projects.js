const projectList = document.querySelector("#projectsList");
fetch("/media/loader_elements/projects.json")
	.then(r => r.json())
	.then(projects => {
		for (let project in projects) {
			let link = document.createElement("a");
			link.href = `/sb3_interface.html?prj=${project}`;
			link.innerText = projects[project].name;

			let listEl = document.createElement("li");
			listEl.appendChild(link);

			projectList.appendChild(listEl);
		}
	})