<?php
    require __DIR__ . "/./functions.php";
?>

                <!-- $_GET['paragraph'] -->

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>hotel</title>

    <!-- bootstrap -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />

    <!-- fonawsome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    />
  </head>
  <body>
    <header>
      <form
        method="GET"
        class="d-flex justify-content-around align-items-center mt-4 mb-4"
      >
        <div class="parking form-check">
          <input class="form-check-input" type="checkbox" id="parking-status" name="parking-status" 
          <?= $filter_parking ? 'checked' : ''; ?>
          />
          <label class="form-check-label" for="parking-status">con parcheggio</label>
        </div>
        <div class="vote">
          <select class="form-select" aria-label="Default select example" id="star_number" name="star_number">
            <option value="0">Scegli l'opzione che preferisci</option>
            <option value="1" <?= ($filter_star && $selected_star == 1) ? 'selected' : ''; ?>>★☆☆☆☆</option>
            <option value="2" <?= ($filter_star && $selected_star == 2) ? 'selected' : ''; ?>>★★☆☆☆</option>
            <option value="3" <?= ($filter_star && $selected_star == 3) ? 'selected' : ''; ?>>★★★☆☆</option>
            <option value="4" <?= ($filter_star && $selected_star == 4) ? 'selected' : ''; ?>>★★★★☆</option>
            <option value="5" <?= ($filter_star && $selected_star == 5) ? 'selected' : ''; ?>>★★★★★</option>
          </select>
        </div>
        <button class="btn btn-primary">Cerca</button>
      </form>
      <hr />
    </header>
    <main>
      <div class="container">
        <table class="table table-primary table-hover">
          <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">Descrizione</th>
            <th scope="col">Parcheggio</th>
            <th scope="col">Stelle</th>
            <th scope="col">Distanza dal centro</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($hotels as $hotel): ?>
              <?php $hotel_index++ ?>
            <tr>
              <th scope="row"> <?= $hotel_index ?></th>
              <td> <?= $hotel["name"] ?> </td>
              <td> <?= $hotel["description"] ?> </td>
              <td> <?= $hotel["parking"] ? '✔️' : '❌'; ?> </td>
              <td> <?= $hotel["vote"] ?>  &star; </td>
              <td> <?= $hotel["distance_to_center"] ?> km </td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>         
      </div>
    </main>
  </body>
</html>
