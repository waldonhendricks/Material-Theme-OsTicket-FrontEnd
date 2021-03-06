<?php

if(!defined('OSTCLIENTINC') || !$thisclient || !$ticket || !$ticket->checkUserAccess($thisclient)) die('Access Denied!');

?>
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h1>
                    <?php echo sprintf(__('Editing Ticket #%s'), $ticket->getNumber()); ?>
                </h1>
            </div>
            <div class="body">
                <form action="tickets.php" method="post">
                    <?php echo csrf_token(); ?>
                    <input type="hidden" name="a" value="edit"/>
                    <input type="hidden" name="id" value="<?php echo Format::htmlchars($_REQUEST['id']); ?>"/>
                    <table width="800">
                        <tbody id="dynamic-form">
                        <?php if ($forms)
                            foreach ($forms as $form) {
                            $form->render(false);
                            } ?>
                        </tbody>
                    </table>
                    <p>
                        <input class="btn btn-success" type="submit" value="Update"/>
                        <input class="btn btn-warning" type="reset" value="Reset"/>
                        <input class="btn btn-default" type="button" value="Cancel" onclick="history.go(-1);"/>
                    </p>
                </form>
            </div>
        </div>
    </div>
</div>