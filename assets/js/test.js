$(".addAnswer").on("click", function () {
  let question = $(this).data("question");
  let answer = $(this).data("answer");
  let answerBlock = $(this).parents("answers").find("answer-items");
  answer++;
  $(this).data("answer", answer);

  answerBlock.prepend(
    `
    <div class="answer__text">
        <label for="answer_text_${question}_${answer}" class="form-label">Ответ #${answer}</label>
        <input type="text" name="answer_text_${question}_${answer}" id="answer_text_${question}_${answer}" class="form-control">
    </div>
   <div class="answer__score">
        <label for="answer_score_${question}_${answer}" class="form-label">Балл за ответ #${answer}</label>
        <input type="text" name="answer_score_${question}_${answer}" id="answer_score_${question}_${answer}" class="form-control">
    </div>
    `
  );
});
