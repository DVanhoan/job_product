import Message from "./components/common/Message";
import { toast, Toaster } from "react-hot-toast";
import { useQuery } from "@tanstack/react-query";
import SideBar from "./components/common/SideBar";
import { useState, useEffect } from "react";

function Main() {
    const [activeConversationId, setActiveConversationId] = useState(null);
    const [recentMessages, setRecentMessages] = useState([]);
    const [user, setUser] = useState(null);

    const { data, error, refetch, } = useQuery({
        queryKey: ["conversations"],
        queryFn: async () => {
            const res = await fetch("/api/messages", {
                method: "GET",
                credentials: "include",
            });
            const data = await res.json();
            if (!res.ok) {
                throw new Error(data.error || "Something went wrong");
            }
            return data;
        },
    });

    useEffect(() => {
        if (data?.recentMessages) {
            setRecentMessages(data.recentMessages);
        }

        if (data?.recentConversationId) {
            setActiveConversationId(data.recentConversationId);
        }

        if (data?.user) {
            setUser(data.user);
        }
    }, [data]);

    const handleConversationClick = async (conversationId) => {
        setActiveConversationId(conversationId);
        const res = await fetch(`/api/conversations/${conversationId}`, {
            method: "GET",
            credentials: "include",
        });
        const data = await res.json();

        if (res.ok) {
            setRecentMessages(data.messages || []);
        }
    };

    if (error) {
        return <div>Error: {error.message}</div>;
    }

    console.log("data", data);

    return (
        <div className="main-layout">
            <SideBar
                conversations={data?.conversations || []}
                activeConversationId={activeConversationId}
                onConversationClick={handleConversationClick}
            />
            <div className="main-container">
                <div className="content-container">
                    <Message
                        messages={recentMessages}
                        user={user}
                        conversationId={activeConversationId}
                        onMessageSent={refetch}
                    />
                </div>
                <Toaster />
            </div>
        </div>
    );
}

export default Main;
