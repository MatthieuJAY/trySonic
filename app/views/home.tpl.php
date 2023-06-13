<h1>Sonic</h1>
<table class="table">
  <thead>
    <tr>
      <th scope="col">&nbsp;</th>
      <th scope="col">Nom</th>
      <th scope="col">Description</th>
      <th scope="col">Type</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($viewVars['charactersList'] as $currentCharacterModel) : ?>
    <tr>
      <td><img class="character-pic" src="<?= $absoluteUrl ?>/assets/img/<?= $currentCharacterModel->getPicture() ?>" alt="<?= $currentCharacterModel->getName() ?>"></td>
      <td class="font-weight-bold"><?= $currentCharacterModel->getName() ?></td>
      <td><?= $currentCharacterModel->getDescription() ?></td>
      <td><?= $viewVars['typesList'][$currentCharacterModel->getTypeId()]->getName() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>