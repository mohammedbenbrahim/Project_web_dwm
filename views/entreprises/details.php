<div class="container mt-5">
  <div class="row">
    <!-- Left column: Logo + Info + QR -->
    <div class="col-lg-4 mb-4">
      <div class="card shadow-sm p-3">
        <?php if($entreprise['logo']): ?>
          <img src="../uploads/logos/<?= $entreprise['logo'] ?>" class="img-fluid rounded mb-3">
        <?php else: ?>
          <img src="https://via.placeholder.com/300x180.png?text=Logo" class="img-fluid rounded mb-3">
        <?php endif; ?>

        <h2 class="fw-bold mb-1"><?= $entreprise['nom'] ?></h2>
        <p class="text-muted mb-2"><?= $entreprise['categorie'] ?></p>
        <p class="mb-2"><?= $entreprise['description'] ?></p>
        <p class="mb-2"><strong>Horaires:</strong> <?= $entreprise['horaires'] ?></p>
        <p class="mb-2">⭐ <?= $entreprise['note_moyenne'] ?>/5 (<?= $entreprise['nombre_avis'] ?> avis)</p>

        <div class="mt-3 text-center">
          <h6>Partager (QR Code)</h6>
          <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=http://localhost/projetc-web/public/entreprise.php?id=<?= $entreprise['id'] ?>" class="img-fluid">
        </div>
      </div>
    </div>

    <!-- Right column: Map + Reviews -->
    <div class="col-lg-8">
      <!-- Map -->
      <div class="card shadow-sm mb-4">
        <div class="card-body p-0">
          <div id="map" style="height:350px;" class="rounded"></div>
        </div>
      </div>

      <!-- Reviews -->
      <div class="mb-4">
        <h4 class="mb-3">Avis</h4>
        <?php if(!empty($avis) && is_array($avis)): ?>
          <?php foreach($avis as $a): ?>
            <div class="card mb-2 shadow-sm">
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-1">
                  <strong><?= htmlspecialchars($a['auteur']) ?></strong>
                  <span>⭐ <?= $a['note'] ?></span>
                </div>
                <p class="mb-0"><?= htmlspecialchars($a['commentaire']) ?></p>
              </div>
            </div>
          <?php endforeach; ?>
        <?php else: ?>
          <p class="text-muted">Aucun avis pour cette entreprise.</p>
        <?php endif; ?>
      </div>

      <!-- Add review form -->
      <div class="card shadow-sm p-3">
        <h5 class="mb-3">Laisser un avis</h5>
        <form method="post" action="../public/add-avis.php">
          <input type="hidden" name="entreprise_id" value="<?= $entreprise['id'] ?>">
          <input class="form-control mb-2" type="text" name="auteur" placeholder="Nom" required>
          <select class="form-select mb-2" name="note" required>
            <option value="5">5 ⭐ Excellent</option>
            <option value="4">4 ⭐ Très bon</option>
            <option value="3">3 ⭐ Bon</option>
            <option value="2">2 ⭐ Moyen</option>
            <option value="1">1 ⭐ Mauvais</option>
          </select>
          <textarea class="form-control mb-2" name="commentaire" placeholder="Votre commentaire" rows="3" required></textarea>
          <button class="btn btn-success w-100">Envoyer</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Google Maps JS -->
<script>
function initMap() {
  const pos = {lat: <?= $entreprise['latitude'] ?>, lng: <?= $entreprise['longitude'] ?>};
  const map = new google.maps.Map(document.getElementById("map"), {zoom:14, center:pos});
  new google.maps.Marker({position:pos, map:map});
}
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap" async defer></script>
