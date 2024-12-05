import React from "react";
import "../../../css/LoadingSpinner.css";

const LoadingSpinner = ({ size = "md" }) => {
    const sizeClass = `loading-${size}`;

    return <span className={`loading-spinner ${sizeClass}`} />;
};

export default LoadingSpinner;
