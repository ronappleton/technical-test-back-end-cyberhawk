import axios from "axios";
import useTokenService from "./useTokenService";
import {useState} from "react";

const useAuthenticationService = () => {
    const { storeToken, removeToken } = useTokenService();
    const [loading, setLoading] = useState(false);
    const [error, setError] = useState();

    const login = async (username, password) => {
        setLoading(true);
        const response = await axios.post('/api/token', {username: username, password: password})
            .then(response => {
                storeToken(response.data)
            })
            .catch(err => {
                setError(err);
            });
        setLoading(false);

        return response;
    }

    const logout = async () => {
        removeToken();
    }

    return { login, logout, loading, error };
}

export default useAuthenticationService;
