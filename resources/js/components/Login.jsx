import React, {useEffect, useState} from "react";
import {useNavigate} from "react-router-dom";
import useAuthenticationService from "../hooks/services/useAuthenticationService";

export default function Login({setLoggedIn}) {
    const navigate = useNavigate();
    const {login, loading, error} = useAuthenticationService();

    const handleSubmit = async (event) => {
        event.preventDefault();
        const formData = new FormData(event.target);

        await login(formData.get('username'), formData.get('password')).then(() => {
            setLoggedIn(true);
            navigate('/farms', {replace: true})
        })
    }

    if(loading) return <p>Loading...</p>;
    if(error) return <p>Error</p>;

    return (
        <div className="relative flex flex-col justify-center min-h-screen overflow-hidden">
            <div className="w-full p-6 m-auto bg-white rounded-md shadow-md lg:max-w-xl">
                <h1 className="text-3xl font-semibold text-center text-indigo-700 underline">
                    Sign in
                </h1>
                <form className="mt-6" onSubmit={handleSubmit}>
                    <div className="mb-2">
                        <label
                            className="block text-sm font-semibold text-gray-800"
                        >
                            Username
                        </label>
                        <input
                            type="username"
                            name="username"
                            className="block w-full px-4 py-2 mt-2 text-purple-700 bg-white border rounded-md focus:border-purple-400 focus:ring-purple-300 focus:outline-none focus:ring focus:ring-opacity-40"
                        />
                    </div>
                    <div className="mb-2">
                        <label
                            className="block text-sm font-semibold text-gray-800"
                        >
                            Password
                        </label>
                        <input
                            type="password"
                            name="password"
                            className="block w-full px-4 py-2 mt-2 text-purple-700 bg-white border rounded-md focus:border-purple-400 focus:ring-purple-300 focus:outline-none focus:ring focus:ring-opacity-40"
                        />
                    </div>
                    <div className="mt-6">
                        <button
                            className="w-full px-4 py-2 tracking-wide text-white transition-colors duration-200 transform bg-indigo-700 rounded-md hover:bg-indigo-600 focus:outline-none focus:bg-purple-600">
                            Login
                        </button>
                    </div>
                    <div className="mt-6">
                        Admin Login <br/>
                        Username: admin <br/>
                        Password: password
                    </div>
                    <div className="mt-6">
                        Non-Inspection Login <br/>
                        Username: non-inspection <br/>
                        Password: password
                    </div>
                </form>
            </div>
        </div>
    );
}
