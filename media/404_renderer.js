const query = new URLSearchParams(location.search);
const page = document.querySelector("#notFoundPage"),
    body = document.querySelector("#notFoundBody"),
    head = document.querySelector("#notFoundHeader"),
    extraText = document.querySelector("#notFoundExTxt"),
    endText = document.querySelector("#notFoundFinal");
const notFoundTxt = {
    page: {
        before: "",
        after: " Check the URL to make sure there's no typos.",
        header: "Page"
    },
    prj: {
        before: "the project ",
        after: " Make sure that you found the project using the list on the homepage.",
        header: "Project"
    },
}

function insertTXT(handlerType) {
    let { before: extra, after: end, header } = notFoundTxt[handlerType];
    extraText.innerText = extra;
    endText.innerText = end;
    head.innerText = `Error 404: ${header} Not Found`;
}

/* Project Error */
var isProjectError = query.has("errRes") && query.get("errRes") == "prj";
const projectName = isProjectError ? (query.has("prjNAME") ? query.get("prjNAME") : false): false
if (!projectName)
    isProjectError = false;

function projectNotFoundHandler() {
    insertTXT("prj");
    page.innerText = projectName;
}

/* Page Error */
const notFoundPage = location.pathname;

function pageNotFoundHandler() {
    insertTXT("page");
    page.innerText = notFoundPage;
}

/* Figure out what to use */

if (isProjectError)
    projectNotFoundHandler();
else
    pageNotFoundHandler();