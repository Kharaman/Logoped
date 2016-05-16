<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

    <h3 class="center-align"><?= $child->full_name; ?></h3>
    <div class="wrapper">
        <div class="tabs">
            <span class="tab">На начало года</span>
            <span class="tab">На конец года</span>
        </div>
        <div class="tab_content">
            <?php foreach ($cards as $card) : ?>

                <div class="tab_item">
                <a class="right" href="/individual_card/delete/<?= $card->id; ?>"><i class="material-icons tools">close</i></a>
<a class="right" href="/individual_card/edit/<?= $card->id; ?>"><i class="material-icons tools">edit</i></a>       


                    <table>
                        <tr>
                            <td>Моторика:</td>
                            <td><?= $card->motility; ?></td>
                        </tr>
                        <tr>
                            <td>Звукопроизношение:</td>
                            <td><?= $card->pronunciation; ?></td>
                        </tr>
                        <tr>
                            <td>Слоговая структура слова:</td>
                            <td><?= $card->syllable_word_structure; ?></td>
                        </tr>
                        <tr>
                            <td>Восприятие цветов:</td>
                            <td><?= $card->color_perception; ?></td>
                        </tr>
                        <tr>
                            <td>Пространственное восприятие:</td>
                            <td><?= $card->spatial_perception; ?></td>
                        </tr>
                        <tr>
                            <td>Счеиные операции глазами:</td>
                            <td><input type="checkbox" disabled <?php if ($card->eyes_count_operations) echo 'checked'; ?>></td>
                        </tr>
                        <tr>
                            <td>Сравнение предметов:</td>
                            <td><?= $card->items_compare; ?></td>
                        </tr>
                    </table>
                </div>
            <?php endforeach; ?>
        </div>



</div>