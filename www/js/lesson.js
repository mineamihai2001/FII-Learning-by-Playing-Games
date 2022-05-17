import { ajax } from "./modules.js";

const nextBtn = document.getElementById("next-btn");
const content = document.getElementById("content");
const chapterId = document.getElementById("current-chapter");
const chapterName = document.getElementById("chapter-name");
const lessonId = document.getElementById("current-lesson");
const lessonName = document.getElementById("lesson-name");


const reset = () => {
  let bubbles = document.getElementsByClassName("bubble");
  for (let bubble of bubbles) {
    bubble.classList.remove("prev-lesson");
    bubble.classList.remove("curr-lesson");
    bubble.classList.remove("next-lesson");
  }
  let previews = document.getElementsByClassName("preview");
  for(let preview of previews) {
      preview.innerHTML = "";
      preview.classList.remove("preview");
  }
};

const statusBar = (lessonsNumber, lesson_id) => {
  reset();
  let bubbles = document.getElementsByClassName("bubble");

  for (let i = 0; i < lessonsNumber; ++i) {
    if (i < lesson_id - 1) {
      bubbles[i].classList.add("prev-lesson");
      var preview = bubbles[i].getElementsByTagName("p");
      preview[0].classList.add("preview");
      preview[0].innerHTML = "Lesson #" + (i + 1);

    } else if (i == lesson_id - 1) {
      bubbles[i].classList.add("curr-lesson");
    } else bubbles[i].classList.add("next-lesson");
  }
};

const getLesson = () => {
  ajax({
    type: "GET",
    url: "/application/index.php?type=lesson",
  }).then((result) => {
    const response = JSON.parse(result);
    console.log(response);

    const body = response.body[0];
    let lesson_id = body.id;

    statusBar(7, lesson_id);

    content.innerHTML = body.content;
    chapterId.innerHTML = "Chapter " + body.chapter_id;
    chapterName.innerHTML = body.chapter_name;
    lessonId.innerHTML = "Lesson " + body.id;
    lessonName.innerHTML = body.name;
  });
};

getLesson();
nextBtn.addEventListener("click", () => {
  getLesson();
});
