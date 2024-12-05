import Echo from "laravel-echo";
import Pusher from "pusher-js";

window.Pusher = Pusher;

const echo = new Echo({
    broadcaster: "pusher",
    key: "af50cf3f9324949fed0f",
    cluster: "ap1",
    forceTLS: true,
});

export default echo;
