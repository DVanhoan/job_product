import Echo from "laravel-echo";
import Pusher from "pusher-js";

window.Pusher = Pusher;

const echo = new Echo({
    broadcaster: "pusher",
    key: "d74d12f9f41b88b65551",
    cluster: "ap1",
    forceTLS: true,
});

export default echo;
