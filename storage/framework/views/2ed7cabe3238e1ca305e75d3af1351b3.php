<!-- resources/views/test/index.blade.php -->



<?php $__env->startSection('title', 'Test Soal'); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <h1 class="text-center">Tes Soal</h1>

    <form action="<?php echo e(route('test.store')); ?>" method="POST" id="testForm">
        <?php echo csrf_field(); ?>

        <!-- Email and Name Input, retain values using JavaScript -->
        <div class="form-group mb-3">
            <input type="email" name="email" class="form-control" placeholder="Email" id="email" required>
        </div>
        <div class="form-group mb-3">
            <input type="text" name="name" class="form-control" placeholder="Nama" id="name" required>
        </div>

        <?php $__currentLoopData = $questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="card mb-3 question-card">
            <div class="card-body">
                <h5 class="card-title"><?php echo e($question->question_text); ?></h5>
                <div class="form-check">
                    <?php $__currentLoopData = $question->answers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $answer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <label class="form-check-label">
                        <input type="radio" name="answers[<?php echo e($question->id); ?>]" value="<?php echo e($answer->answer_text); ?>"
                            class="form-check-input"
                            data-question-id="<?php echo e($question->id); ?>"
                            data-answer="<?php echo e($answer->answer_text); ?>"
                            <?php echo e((isset($answers[$question->id]) && $answers[$question->id] == $answer->answer_text) ? 'checked' : ''); ?>>
                        <?php echo e($answer->answer_text); ?>

                    </label><br>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <!-- Pagination for next and previous -->
        <div class="d-flex justify-content-between mb-3">
            <div>
                <?php echo e($questions->links()); ?> <!-- Pagination links -->
            </div>
        </div>

        <button type="submit" class="btn btn-primary btn-block">Kirim Jawaban</button>
    </form>
</div>

<script>
    // Function to save form data into session storage
    function saveFormData() {
        const email = document.getElementById('email').value;
        const name = document.getElementById('name').value;
        const answers = {};

        // Collect all selected answers
        document.querySelectorAll('input[type="radio"]:checked').forEach((radio) => {
            answers[radio.dataset.questionId] = radio.dataset.answer;
        });

        // Save data into sessionStorage
        sessionStorage.setItem('email', email);
        sessionStorage.setItem('name', name);
        sessionStorage.setItem('answers', JSON.stringify(answers));
    }

    // Function to load form data from session storage
    function loadFormData() {
        const email = sessionStorage.getItem('email');
        const name = sessionStorage.getItem('name');
        const answers = JSON.parse(sessionStorage.getItem('answers')) || {};

        // Set form data from sessionStorage
        if (email) {
            document.getElementById('email').value = email;
        }
        if (name) {
            document.getElementById('name').value = name;
        }

        // Set checked answers based on stored answers
        document.querySelectorAll('input[type="radio"]').forEach((radio) => {
            if (answers[radio.dataset.questionId] === radio.dataset.answer) {
                radio.checked = true;
            }
        });
    }

    // When the page loads, load saved data
    document.addEventListener('DOMContentLoaded', loadFormData);

    // Save form data before the form is submitted
    document.getElementById('testForm').addEventListener('submit', saveFormData);

    // Save form data when navigating between pages (pagination)
    document.querySelectorAll('.pagination a').forEach((link) => {
        link.addEventListener('click', saveFormData);
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Laragon\testdisc\resources\views/test/index.blade.php ENDPATH**/ ?>