import "../../../css/sidebar.css";
import LoadingSpinner from "./LoadingSpinner";

const SideBar = ({ conversations = [], onConversationClick, activeConversationId, isLoading }) => {
    console.log("conversations: ", conversations);

    return (
        <div className="sidebar">
            <div className="sidebar-header">
                <h1>Chat</h1>
            </div>

            <div className="search-bar">
                <input type="text" placeholder="Search Messenger" />
            </div>

            <div className="chat-list">
                {isLoading ? (
                    <div
                        style={{
                            display: "flex",
                            justifyContent: "center",
                            alignItems: "center",
                            height: "100%",
                        }}
                    >
                        <LoadingSpinner size="md" />
                    </div>
                ) : conversations && conversations.length > 0 ? (
                    conversations.map((conversation) => (
                        <div
                            key={conversation.id}
                            className={`chat-item ${conversation.id === activeConversationId ? "active" : ""
                                } ${conversation.unread ? "unread" : ""}`}
                            onClick={() => onConversationClick(conversation.id)}
                        >
                            <div className="avatar">
                                <img
                                    src={
                                        conversation.other_participant?.avatar ||
                                        "/images/user-profile.png"
                                    }
                                    alt="Avatar"
                                />
                            </div>
                            <div className="chat-details">
                                <p className="chat-name">
                                    {conversation.other_participant?.name}
                                </p>
                                <p className="chat-message">
                                    {conversation.isSender
                                        ? `You: ${conversation.last_message?.length > 4
                                            ? conversation.last_message.slice(0, 4) + "..."
                                            : conversation.last_message
                                        }`
                                        : `${conversation.other_participant?.name
                                        }: ${conversation.last_message?.length > 4
                                            ? conversation.last_message.slice(0, 4) + "..."
                                            : conversation.last_message || "No messages yet"
                                        }`}
                                </p>
                            </div>
                            <p className="chat-time">{conversation.last_message_time}</p>
                        </div>
                    ))
                ) : (
                    <p>No conversations available</p>
                )}
            </div>
        </div>
    );
};

export default SideBar;
