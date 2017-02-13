{% extends "layout.php" %}

{% block cuerpo %}

<form action="importar" method="post" enctype="multipart/form-data">
    Select CSV to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload CSV" name="submit">
</form>

{% endblock cuerpo %}

