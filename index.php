<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans+Condensed:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <title>Student Card</title>
</head>
<body>
    <div class="content">
        <div class="wrapper">
            <div class="half-window">
                <div class="card-container">
                    <div class="grid-container">
                        <!-- Above student picture -->
                        <div class="item1">STUDENT CARD</div>
                        <!-- Student picture display if a file is uploaded -->
                        <div class="item2">
                        <?php if (!$_FILES || $_POST['student-pic'] == null) { ?>
                            <img src="student-icon.png" class="student-pic">
                        <?php
                        } else {
                            $target_dir = "img/";
                            $target_file = $target_dir . basename($_FILES["student-pic"]["name"]);

                            move_uploaded_file($_FILES["student-pic"]["tmp_name"], $target_file);

                            echo '<img src="'. $target_file .'" class="student-pic" alt="">';
                        }
                        ?>
                        </div>
                        <!-- Below student picture, student name -->
                        <div class="item3">
                        <?php if (!$_POST['student-name']) { ?>
                        STUDENT NAME
                        <?php
                        } else {
                            echo strtoupper($_POST['student-name']);
                        }
                        ?>
                        </div>
                        <div class="item4">
                        <?php if (!$_POST['course-duration']) { ?>
                        ONE-YEAR FULL-TIME
                        <?php
                        } else {
                            echo strtoupper($_POST['course-duration']);
                        }
                        ?> <br> 
                        <?php if (!$_POST['course']) { ?>
                        PROFESSIONAL PHOTOGRAPHY CLASS
                        <?php
                        } else {
                            echo strtoupper($_POST['course']);
                        }
                        ?>
                        </div>
                        <div class="item5">
                        <?php if (!$_POST['student-account']) { ?>
                        Student# 123456
                        <?php
                        } else {
                            echo "Acc# ".strtoupper($_POST['student-account']);
                        }
                        ?>
                        </div>
                        <div class="item6">
                            <img class="logo" src="logo.jpg" >
                        </div>
                        <div class="item7" id="valid">THIS CARD CONFIRMS THAT THE ABOVE MENTION STUDENT IS ENROLLED IN <br> THE RESPECTIVE CLASS / COURSE UNTIL 
                        <?php if (!$_POST['course']) { ?>
                        <u>31-12-2021</u>
                        <?php
                        } else {
                            echo strtoupper($_POST['end-date']);
                        }
                        ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="half-window">
                <div class="form-container">
                    <div class="grid-container">
                        <form action="index.php" method="post" enctype="multipart/form-data" class="student-form">
                            <div class="form-item">
                                <label for="student-pic" class="form-label">Student Picture</label>
                                <input type="file" name="student-pic" class="form-student-pic">
                            </div>
                            <div class="form-item">
                                <label for="student-name" class="form-label">Student Name & Surname</label>
                                <input type="text" name="student-name" placeholder="STUDENT NAME">
                            </div>
                            <div class="form-item">
                                <label for="course-duration" class="form-label">Course / Class Duration</label>
                                <input type="text" name="course-duration" placeholder="ONE-YEAR FULL-TIME">
                            </div>
                            <div class="form-item">
                                <label for="course" class="form-label">Course / Class</label>
                                <input type="text" name="course" placeholder="PROFESSIONAL PHOTOGRAPHY CLASS">
                            </div>
                            <div class="form-item">
                                <label for="student-number" class="form-label">Student Number</label>
                                <input type="text" name="student-number" placeholder="123456">
                            </div>
                            <div class="form-item">
                                <label for="end-date" class="form-label">End Date</label>
                                <input type="date" name="end-date" >
                            </div>
                            <div class="form-item">
                                <button type="submit" class="form-submit" name="submit">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</body>
</html>