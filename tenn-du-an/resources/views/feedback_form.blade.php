<!-- resources/views/feedback_form.blade.php -->
<div class="chat-container">
    <div class="feedback-form">
        <h3>Feedback Form</h3>
        <p>We would love to hear your feedback!</p>

        @if ($feedbackSubmitted)
            <p style="color: green;">Feedback submitted successfully! Thank you for your input.</p>
        @endif

        <form method="post" action="{{ url('/submit-feedback') }}">
            @csrf
            <textarea name="feedback-input" id="feedback-input" placeholder="Type your feedback here..."></textarea>
            <button type="submit" class="submit-feedback">Submit Feedback</button>
        </form>
    </div>

    <!-- Hiển thị tất cả phản hồi dưới biểu mẫu -->
    <div class="existing-feedback">
        <h3>All Feedback</h3>
        @foreach ($allFeedbackList as $feedbackItem)
            <p><strong>{{ $feedbackItem->taikhoan }}:</strong> {{ $feedbackItem->thongtin_phanhoi }}</p>
        @endforeach
    </div>
</div>

<script>
    // Bạn có thể giữ nguyên JavaScript hiện tại cho xác thực hoặc tương tác phía client
    function submitFeedback() {
        const feedbackInput = document.getElementById('feedback-input');
        const feedback = feedbackInput.value.trim();

        if (feedback !== '') {
            // Bạn có thể gửi phản hồi đến máy chủ để xử lý/lưu trữ
            alert('Thank you for your feedback!'); // Thay thế với logic gửi thực tế
            feedbackInput.value = '';
            feedbackInput.focus();
        }
    }
</script>
