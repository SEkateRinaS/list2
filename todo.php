<?php
    $errors = "";
    $db = mysqli_connect('localhost', 'root', '', 'todo');
    if (isset($_POST['user'])) {
        $task = $_POST['task'];
        if (empty($task)){
            $errors = "Введите текст";
        }
        else{
        //mysqli_query($db, "INSERT INTO tasks (task) VALUES ('$task')")
        header('Location: profile.php');
        }
    }
if (isset($_GET['del_task'])) {
    $id = $_GET['del_task'];
    
    header('Location: profile.php');
}

    $task = mysqli_query($db,"SELECT * FROM tasks");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>todo list</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="heading">
        <h2> TODO LIST</h2>
    </div>
    <form method="POST" action="todo.php">
    <?php if (isset($errors)) { ?>
        <p><?php echo $errors;</p>
    <?php} ?>
        <input type="text" name="task" class="task_todo">
        <button type="submit" class="add_btn" name="submit">Add Task</button>
    </form>

    <table>
        <thead>
            <tr>
               <th>N</th> 
               <th>Task</th>
               <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php  $i = 1; while ($row = mysqli_fetch_array($task)) { ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td class="task"><?php echo $i; ?></td>
                <td class="delete">
                    <a href="todo.php?del_task = <?php echo $row['id']; ?>">x</a>
                </td>
            </tr>
            <?php $i++;} ?>
        </tbody>
    </table>
</body>
</html>