<section class="bg-dark py-5">
    <footer class="container mx-auto d-flex flex-wrap justify-content-between align-items-start px-5">

        <div class="col-12 col-md-3 text-center text-md-start mb-4">
            <img src="{{ asset('Logo.svg') }}" alt="logo" class="invert img-fluid mb-3" />
            <p class="text-muted">
                Ehya is a job board and job site for job seekers and employers.
            </p>
            <ul class="list-inline mt-4">
                <li class="list-inline-item">
                    <a href="https://twitter.com/" target="_blank" class="text-secondary">
                        <i class="fab fa-twitter fa-lg"></i>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a href="https://www.youtube.com/" target="_blank" class="text-secondary">
                        <i class="fab fa-youtube fa-lg"></i>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a href="https://www.instagram.com/" target="_blank" class="text-secondary">
                        <i class="fab fa-instagram fa-lg"></i>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a href="https://www.facebook.com/" target="_blank" class="text-secondary">
                        <i class="fab fa-facebook fa-lg"></i>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a href="https://t.me/" target="_blank" class="text-secondary">
                        <i class="fab fa-telegram fa-lg"></i>
                    </a>
                </li>
            </ul>
        </div>


        <div class="col-12 col-sm-6 col-md-2 text-center text-md-start mb-4">
            <h5 class="text-light">Search for jobs</h5>
            <ul class="list-unstyled mt-3">
                <li><a href="{{ route('job.index') }}" class="text-muted">Job by location</a></li>
                <li><a href="{{ route('job.index') }}" class="text-muted">Job by category</a></li>
                <li><a href="{{ route('job.index') }}" class="text-muted">Job by company</a></li>
                <li><a href="{{ route('job.index') }}" class="text-muted">Job by keyword</a></li>
                <li><a href="{{ route('job.index') }}" class="text-muted">Job by salary</a></li>
            </ul>
        </div>

        <div class="col-12 col-sm-6 col-md-2 text-center text-md-start mb-4">
            <h5 class="text-light">For employers</h5>
            <ul class="list-unstyled mt-3">
                <li><a href="{{ route('post.create') }}" class="text-muted">Create job</a></li>
                <li><a href="{{ route('account.authorSection') }}" class="text-muted">Manage job</a></li>
                <li><a href="{{ route('jobApplication.index') }}" class="text-muted">Job applications</a></li>
                <li><a href="{{ route('savedJob.index') }}" class="text-muted">Manage candidates</a></li>
                <li><a href="{{ route('company.store') }}" class="text-muted">Manage company</a></li>
            </ul>
        </div>

        <div class="col-12 col-sm-6 col-md-2 text-center text-md-start mb-4">
            <h5 class="text-light">About</h5>
            <ul class="list-unstyled mt-3">
                <li><a href="/" class="text-muted">About us</a></li>
                <li><a href="/" class="text-muted">What we do</a></li>
                <li><a href="/" class="text-muted">Our team</a></li>
                <li><a href="/" class="text-muted">Contact</a></li>
            </ul>
        </div>
    </footer>
</section>


<button class="messages" onclick="openChatModal()">
    <i class="fa fa-comments"></i>
</button>


<div class="chat-container">
    <div class="chat-header">
       <h5>Chat</h5>
       <button type="button" class="close" onclick="closeChatModal()">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    <div class="chat-messages">
        <p><strong>You:</strong> Hello</p>
        <p><strong>Bot:</strong> Hi there!</p>
        <p><strong>You:</strong> How are you?</p>
        <p><strong>Bot:</strong> I'm good, thanks!</p>
        <p><strong>You:</strong> How can I help you?</p>
    </div>
    <div class="chat-input">
        <input type="text" id="chatInput" placeholder="Type your message...">
        <button id="sendBtn">Send</button>
    </div>
</div>

<div class="chat-list-container">
    <div class="chat-header">
        <h5>Chat</h5>
        <button type="button" class="close" onclick="closeChatModal()">
             <span aria-hidden="true">&times;</span>
         </button>
    </div>
    <div class="chat-list">
        <div class="chat-item">
            <img src="{{ asset('images/user-profile.png') }}" alt="Avatar" class="chat-avatar" />
        <div class="chat-content">
        <div class="item-header">
            <span class="chat-name">Mobile App</span>
            <span class="chat-time">1h</span>
        </div>
            <p class="chat-message">M Akash: 2020 Play Console Ava...</p>
        </div>
        <div class="chat-status"></div>
    </div>
    </div>
</div>

<button onclick="scrollToTop()" id="scrollToTopBtn" class="scroll-to-top">
    <i class="fas fa-arrow-up"></i>
</button>


<script>
    document.querySelector(".chat-list-container").addEventListener("click", function (event) {
        if (event.target.closest(".chat-item")) {
            chat();
        }
    });

    document.addEventListener("click", function (event) {
        const chatListContainer = document.querySelector(".chat-list-container");
        const chatContainer = document.querySelector(".chat-container");
        const chatButton = document.querySelector(".messages");
        const scrollToTopBtn = document.getElementById("scrollToTopBtn");
        if (
            !chatListContainer.contains(event.target) &&
            !chatContainer.contains(event.target) &&
            !chatButton.contains(event.target) &&
            chatContainer.style.display === "block"
        ) {
            chatListContainer.style.display = "none";
            chatContainer.style.display = "none";
            scrollToTopBtn.style.display = "block";
        }
    });

    function openChatModal() {
        const chatListContainer  = document.querySelector(".chat-list-container");
        const scrollToTopBtn = document.getElementById("scrollToTopBtn");

        chatListContainer.style.display = "block";
        scrollToTopBtn.style.display = "none";
    }

    function closeChatModal() {
        const chatListContainer = document.querySelector(".chat-list-container");
        const scrollToTopBtn = document.getElementById("scrollToTopBtn");

        chatListContainer.style.display = "none";
        scrollToTopBtn.style.display = "block";
    }



    function chat() {
        const chatContainer = document.querySelector(".chat-container");
        const chatListContainer = document.querySelector(".chat-list-container");
        const scrollToTopBtn = document.getElementById("scrollToTopBtn");


        chatContainer.style.display = "block";

        chatListContainer.style.display = "none";
        scrollToTopBtn.style.display = "none";
    }


    window.onscroll = function () {
        const chatContainer = document.querySelector(".chat-container");
        const chatListContainer = document.querySelector(".chat-list-container");
        if (chatContainer.style.display === "block") {
            chatContainer.style.display = "none";
        }

        if (chatListContainer.style.display === "block") {
            chatListContainer.style.display = "none";
        }

        const scrollToTopBtn = document.getElementById("scrollToTopBtn");
        if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
            scrollToTopBtn.style.display = "block";
        } else {
            scrollToTopBtn.style.display = "none";
        }
    };
    function scrollToTop() {
        window.scrollTo({ top: 0, behavior: "smooth" });
    }

</script>


<style>
    .chat-list {
        width: 300px;
        max-height: 500px;
        overflow-y: auto;
        border: 1px solid #ddd;
        border-radius: 8px;
        background-color: #fff;
        padding: 10px;
    }

    .chat-item {
        display: flex;
        align-items: center;
        margin-bottom: 15px;
        position: relative;
    }

    .chat-avatar {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        margin-right: 10px;
        object-fit: cover;
    }

    .chat-content {
        flex: 1;
    }

    .item-header {
        display: flex;
        justify-content: space-between;
        margin-bottom: 5px;
    }

    .chat-name {
        font-weight: bold;
        font-size: 14px;
        color: #333;
    }

    .chat-time {
        font-size: 12px;
        color: #aaa;
    }

    .chat-message {
        font-size: 13px;
        color: #555;
        margin: 0;
    }

    .chat-status {
        width: 10px;
        height: 10px;
        border-radius: 50%;
        background-color: blue;
        position: absolute;
        top: 50%;
        right: 0;
        transform: translateY(-50%);
    }

    .chat-item:last-child {
        margin-bottom: 0;
    }


    .messages {
        position: fixed;
        bottom: 30px;
        right: 30px;
        background-color: #007bff;
        color: #fff;
        border-radius: 50%;
        width: 55px;
        height: 55px;
        display: flex;
        justify-content: center;
        align-items: center;
        cursor: pointer;
    }

    .chat-container, .chat-list-container{
        position: fixed;
        bottom: 30px;
        right: 30px;
        width: 300px;
        height: 400px;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        overflow: hidden;
        display: none;
    }


    .chat-header {
        background-color: #007bff;
        color: #fff;
        padding: 10px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .chat-header h5 {
        margin: 0;
    }

    .chat-header button {
        background: none;
        border: none;
        color: #fff;
        cursor: pointer;
    }

    .chat-messages {
        height: 300px;
        overflow-y: scroll;
        padding: 10px;
    }

    .chat-input {
        display: flex;
        padding: 10px;
    }

    .chat-input input {
        flex: 1;
        padding: 5px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .chat-input button {
        margin-left: 10px;
        padding: 5px 10px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }


    footer {
        display: flex;
        flex-wrap: wrap;
        gap: 2rem;
    }

    footer .col-md-3 img {
        max-width: 150px;
    }

    footer h5 {
        font-size: 1.2rem;
        font-weight: bold;
        margin-bottom: 1rem;
    }

    footer ul {
        padding-left: 0;
        list-style: none;
    }

    footer ul li {
        margin-bottom: 0.5rem;
    }

    footer ul li a {
        color: #6c757d;
        transition: color 0.3s;
    }

    footer ul li a:hover {
        color: #fff;
    }

    footer .list-inline-item a {
        transition: color 0.3s;
    }

    footer .list-inline-item a:hover {
        color: #fff;
    }

    .scroll-to-top {
        position: fixed;
        bottom: 7rem;
        right: 2rem;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 50%;
        padding: 0.6rem 1.1rem 0.6rem 1.1rem;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        cursor: pointer;
        transition: background 0.3s;
    }

    .scroll-to-top:hover {
        background: #064c97;
    }

</style>
