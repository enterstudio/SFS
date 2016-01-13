<?php snippet('header') ?>

<h1><?php echo $page->title()->html() ?></h1>
<?php echo $page->text()->kirbytext() ?>

<form action="<?php echo $page->url()?>#form" method="post" id="contact-form">
	
	<label for="message">Your message</label>
    <textarea name="message" id="message"><?php $form->echoValue('message') ?></textarea>

    <label for="name" class="required">Name</label>
    <input<?php e($form->hasError('name'), ' class="erroneous"')?> type="text" name="name" id="name" value="<?php $form->echoValue('name') ?>" required/>

    <label for="email" class="required">E-Mail</label>
    <input<?php e($form->hasError('_from'), ' class="erroneous"')?> type="email" name="_from" id="email" value="<?php $form->echoValue('_from') ?>" required/>
    
    <label for="phone">Phone</label>
    <input type="text" name="phone" id="phone" value="<?php $form->echoValue('phone') ?>" placeholder="Optional" />

    <label class="uniform__potty" for="website">Please leave this field blank</label>
    <input type="text" name="website" id="website" class="uniform__potty" />

    <a name="form"></a>
<?php if ($form->hasMessage()): ?>
    <div class="message <?php e($form->successful(), 'success' , 'error')?>">
        <?php $form->echoMessage() ?>
    </div>
<?php endif; ?>

    <button type="submit" name="_submit" class="button" value="<?php echo $form->token() ?>"<?php e($form->successful(), ' disabled')?>>Submit</button>
</form>

<?php snippet('footer') ?>