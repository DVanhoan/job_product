import Echo from "laravel-echo";
import Pusher from "pusher-js";

window.Pusher = Pusher;

const echo = new Echo({
    broadcaster: "pusher",
    key: "5d3531137de2e604c79c",
    cluster: "ap1",
    forceTLS: true,
});

export default echo;
