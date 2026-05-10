<!DOCTYPE html>
<html>
<head>

    <title>Add Project</title>

</head>

<body>

<h1>Add Project</h1>

<form
action="/admin/store"
method="POST"
enctype="multipart/form-data"
>

<input
type="text"
name="title"
placeholder="Project Title"
required
>

<br><br>

<textarea
name="description"
placeholder="Description"
required
></textarea>

<br><br>

<input
type="text"
name="location"
placeholder="Location"
required
>

<br><br>

<input
type="file"
name="image"
required
>

<br><br>

<button type="submit">
Upload Project
</button>

</form>

</body>
</html>