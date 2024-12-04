import { Link } from "react-router-dom";
import LoadingSpinner from "./LoadingSpinner";
import RightPanelSkeleton from "../skelotons/RightPanelSkeleton";
import "../../../css/rightpanel.css";

const suggestedUsers = [
    {
        _id: "1",
        username: "user1",
        fullName: "User 1",
        profileImg: "/avatar-placeholder.png",
    },
    {
        _id: "2",
        username: "user2",
        fullName: "User 2",
        profileImg: "/avatar-placeholder.png",
    },
    {
        _id: "3",
        username: "user3",
        fullName: "User 3",
        profileImg: "/avatar-placeholder.png",
    },
];

const RightPanel = () => {
    const isLoading = false;

    if (!suggestedUsers || suggestedUsers.length === 0) {
        return <div className="right-panel-empty"></div>;
    }

    return (
        <div className="right-panel">
            <div className="right-panel-header">
                <h2>Suggested Users</h2>
            </div>
            <div className="right-panel-content">
                {isLoading ? (
                    <RightPanelSkeleton />
                ) : (
                    suggestedUsers.map((user) => (
                        <Link
                            key={user._id}
                            to={`/users/${user.username}`}
                            className="right-panel-user"
                        >
                            <img
                                src={user.profileImg}
                                alt={user.fullName}
                                className="right-panel-profile-img"
                            />
                            <div className="right-panel-user-info">
                                <h3>{user.fullName}</h3>
                                <p>{user.username}</p>
                            </div>
                        </Link>
                    ))
                )}
            </div>
        </div>
    );

};

export default RightPanel;
