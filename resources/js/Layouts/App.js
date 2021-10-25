import Navbar from "@/Components/Navbar";
import React from "react";

export default function App({ children }) {
    return (
        <div className="min-h-screen bg-gray-100">
            <Navbar />
            <main>{children}</main>
        </div>
    );
}
