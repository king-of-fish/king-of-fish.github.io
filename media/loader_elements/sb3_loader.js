const { searchParams: parameters } = new URL(location);

const project = parameters.get("prj");
const projectURL = `${location.host}/media/projects/${project}`;
const EL = document.querySelector;
const other_params = [
	[ "username", "Player" ],
	[ "addons", [ "pause" ].join(",") ],
].map(e => {
	if (e.length == 2)
		return `${e[0]}=${e[1]}`
	return e[0];
}).join("&");

const createURL = (page, overwritePrjURL = projectURL) => `https://turbowarp.org/${page}?project_url=${encodeURIComponent(overwritePrjURL)}&${other_params}`

const projectEmbed = EL("#project");
projectEmbed.src = createURL("embed");

const seeInside = EL("#seeInside");
seeInside.href = createURL("editor");

const projectName = EL("#projectName"),
	desc = EL("#description"),
	instr = EL("#instructions");
fetch("/media/loader_elements/projects.json")
	.then(r => r.json())
	.then(DATA => {
		let {useHTML, ...projectData} = DATA[project];
		projectName.innerText = projectData.name;
		document.title = `${projectData.name} - Projects`;
		desc.innerText = projectData.desc;
		if (useHTML.includes("desc"))
			desc.innerHTML = projectData.desc;
		instr.innerText = projectData.instr;
		if (useHTML.includes("instr"))
			instr.innerHTML = projectData.instr;
	});

console.log(`Fetching project #{project}`);