<div class="mt-4">
  <h4 class="mb-3">Laisser un avis</h4>
  <form method="post" action="../public/add-avis.php" class="mb-4">
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
    
    <button type="submit" class="btn btn-success">Envoyer</button>
  </form>

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
    <p>Aucun avis pour cette entreprise.</p>
  <?php endif; ?>
</div>
