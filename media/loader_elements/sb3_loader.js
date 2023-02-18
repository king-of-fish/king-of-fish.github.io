const { searchParams: parameters } = new URL(location);

const project = parameters.get("prj");
const projectURL = `${location.host}/media/projects/${project}`;
const other_params = [
	[ "username", "Player" ],
].map(e => `${e[0]}=${e[1]}`).join("&");

const createURL = page => `https://turbowarp.org/${page}?project_url=${encodeURIComponent(projectURL)}&${other_params}`

const projectEmbed = document.querySelector("#project");
projectEmbed.src = createURL("embed");

const projectName = document.querySelector("#projectName"),
	desc = document.querySelector("#description"),
	instr = document.querySelector("#instructions"),
	seeInside = document.querySelector("#seeInside");
fetch("/media/loader_elements/projects.json")
	.then(r => r.json())
	.then(DATA => {
		let projectData = DATA[project];
		projectName.innerText = projectData.name;
		document.title = `${projectData.name} - Projects`;
		desc.innerText = projectData.desc;
		instr.innerText = projectData.instr;
		seeInside.href = createURL("editor");
	});

console.log(project);