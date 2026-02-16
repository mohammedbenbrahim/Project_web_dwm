<div class="container mt-4">

  <!-- ======= Advanced Search ======= -->
  <div class="card mb-4 shadow-sm p-3">
    <form method="GET" action="index.php" class="row g-3 align-items-end">
      <!-- Nom -->
      <div class="col-md-4">
        <label class="form-label">Nom de l'entreprise</label>
        <input type="text" name="nom" class="form-control" placeholder="Ex: Tech Maroc" value="<?= htmlspecialchars($_GET['nom'] ?? '') ?>">
      </div>

      <!-- Catégorie -->
      <div class="col-md-3">
        <label class="form-label">Catégorie</label>
        <select name="categorie" class="form-select">
          <option value="">Toutes les catégories</option>
          <option value="Informatique" <?= (($_GET['categorie'] ?? '') == 'Informatique') ? 'selected' : '' ?>>Informatique</option>
          <option value="Restauration" <?= (($_GET['categorie'] ?? '') == 'Restauration') ? 'selected' : '' ?>>Restauration</option>
          <option value="Santé" <?= (($_GET['categorie'] ?? '') == 'Santé') ? 'selected' : '' ?>>Santé</option>
        </select>
      </div>

      <!-- Proximité -->
      <div class="col-md-3">
        <label class="form-label">Proximité</label>
        <input type="text" name="ville" class="form-control" placeholder="Ex: Casablanca" value="<?= htmlspecialchars($_GET['ville'] ?? '') ?>">
      </div>

      <!-- Bouton -->
      <div class="col-md-2">
        <button type="submit" class="btn btn-primary w-100">Rechercher</button>
      </div>
    </form>
  </div>

  <!-- ======= Company Cards ======= -->
  <div class="row g-4">
    <?php foreach($entreprises as $entreprise): ?>
      <div class="col-md-4 col-sm-6">
        <div class="card h-100 shadow-sm border-0 hover-card">
          <img src="<?= $entreprise['logo'] ? '../uploads/logos/'.$entreprise['logo'] : 'https://via.placeholder.com/300x180.png?text=Logo' ?>" class="card-img-top" style="height:200px; object-fit:cover;">
          <div class="card-body d-flex flex-column">
            <h5 class="card-title"><?= $entreprise['nom'] ?></h5>
            <p class="card-text text-muted mb-2"><?= $entreprise['categorie'] ?></p>
            <p class="card-text mb-3">⭐ <?= $entreprise['note_moyenne'] ?>/5</p>
            <a href="entreprise.php?id=<?= $entreprise['id'] ?>" class="btn btn-primary mt-auto">Voir</a>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>

</div>
