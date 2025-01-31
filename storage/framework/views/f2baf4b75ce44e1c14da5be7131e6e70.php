<!-- resources/views/test/result.blade.php -->

<h1>Hasil Tes</h1>
<ul>
    <?php $__currentLoopData = $userAnswers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $userAnswer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li><?php echo e($userAnswer->question->question_text); ?> - Jawaban Anda: <?php echo e($userAnswer->answer_text); ?> - Skor: <?php echo e($userAnswer->score); ?></li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>

<p>Total Skor: <?php echo e($totalScore); ?></p>
<?php /**PATH E:\Laragon\testdisc\resources\views/test/result.blade.php ENDPATH**/ ?>