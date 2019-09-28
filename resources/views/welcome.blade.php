<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="https://fonts.googleapis.com/css?family=Fira+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css">
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="/js/quiz.js"></script>
</head>
<body class="body">
<span id="loadContainer"></span>
<div class="container">
    <div class="row"><br><br>
        <div class="col-sm-12 quiz-container">
            <div class="loader">
                <div class="col-xs-3 col-xs-offset-5">
                    <div id="loadbar" style="display: none;">
                        <img src="https://media0.giphy.com/media/l4FGIO2vCfJkakBtC/source.gif" alt="Loading" class="center-block loanParamsLoader" style="">
                    </div>
                </div>

                <div id="quiz">
                    <div class="question effect7">
                        <h3>
                            <span id="question"></span>
                        </h3>
                    </div>
                    <div class="question-img">
                    </div>
                    <ul id="answers">

                    </ul>
                </div>
            </div>
            <div class="text-muted">
                <span id="answer"></span>
            </div>

        </div>
    </div>
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
            <div id="result-of-question" class="pulse animated" style="display: none;">
                <span id="totalCorrect" class="pull-right"></span>
                <table class="table table-hover table-responsive" >
                    <thead>
                    <tr>
                        <th>Question No.</th>
                        <th>Our answer</th>
                        <th>Your answer</th>
                        <th>Result</th>
                    </tr>
                    </thead>
                    <tbody id="quizResult"></tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<br><br><br><br><br><br><br><br><br><br>
</body>
</html>
