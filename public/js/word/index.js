import wordController from "./Controller/wordController.js";
import wordModel from "./Model/wordModel.js";
import wordRenderTemplate from "./View/wordRenderTemplate.js";

const inputQuery = document.querySelector('#_searcher');

const appModel = wordModel({view: wordRenderTemplate});

const appController = wordController({
    input: inputQuery,
    model: appModel,
});

appController.initEvent();