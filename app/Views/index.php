<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Uas web lanjut</title>
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous"> -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link rel="stylesheet" href="/style.css">
</head>

<body>

  <header>
    <?= $this->include('template/navbar') ?>
  </header>
  <div class="mx-5 mt-3 ">
    <?= $this->renderSection('content') ?>
  </div>

  <footer>
    <?= $this->include('template/footer') ?>
  </footer>

  <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script> -->
  <script>
    function labelImage() {
      const image = document.querySelector('#image')
      const namaImage = document.querySelector('.custom-file-label');

      namaImage.textContent = image.files[0].name;

      const fileImage = new FileReader();

      fileImage.readAsDataURL(image.files[0])
      fileImage.onload = function(e) {
        img.src = e.target.result;
      }
    }
  </script>
</body>

</html>