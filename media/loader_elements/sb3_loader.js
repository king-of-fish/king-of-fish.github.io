const { searchParams: parameters } = new URL(location);

const project = parameters.get("prj");
const projectURL = `${location.host}/media/projects/${project}`;

const projectEmbed = document.querySelector("#project");
projectEmbed.src = `https://turbowarp.org/embed?project_url=${encodeURIComponent(projectURL)}`;

const projectName = document.querySelector("#projectName"),
	desc = document.querySelector("#description"),
	instr = document.querySelector("#instructions");
fetch("/media/loader_elements/projects.json")
	.then(r => r.json())
	.then(DATA => {
		let projectData = DATA[project];
		projectName.innerText = projectData.name;
		document.title = `${projectData.name} - Projects`;
		desc.innerText = projectData.desc;
		instr.innerText = projectData.instr;
	})

console.log(project);