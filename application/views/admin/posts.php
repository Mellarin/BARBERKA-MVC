<div class="content-wrapper">
    <div class="container-fluid">
        <div class="card mb-3">
            <div style="font-size:35px;" class="card-header">Haircuts</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-4">
                        <?php if (empty($list)): ?>
                            <p>Nothing :(</p>
                        <?php else: ?>
                            <table class="table">
                                <tr>
                                    <th style="font-size:30px;">Name</th>
                                    <th style="font-size:30px;">Update</th>
                                    <th style="font-size:30px;">Delete</th>
                                </tr>
                                <?php foreach ($list as $item): ?>
                                    <tr>
                                        <td style="font-size:25px;"><?php echo htmlspecialchars($item['name'], ENT_QUOTES); ?></td>
                                        <td><a href="/admin/edithaircut/<?php echo $item['ID']; ?>" class="btn btn-primary">Update</a></td>
                                        <td><a href="/admin/deletehaircut/<?php echo $item['ID']; ?>" class="btn btn-danger">Delete</a></td>
                                    </tr>
                                <?php endforeach; ?>
                            </table>
                            <?php echo $pagination; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>