import axios from 'axios';
import { useState } from 'react';
import useLocalStorage from './useLocalStorage';

const useAuthenticationService = () => {
  const {
    storeToken, removeToken, storePermissions, removePermissions,
  } = useLocalStorage();
  const [loading, setLoading] = useState(false);
  const [error, setError] = useState();

  const login = async (username, password) => {
    setLoading(true);
    const response = await axios.post('/api/token', { username, password })
      .then((res) => {
        storeToken(res.data.access_token);
        storePermissions(res.data.permissions);
      })
      .catch((err) => {
        setError(err);
      });
    setLoading(false);

    return response;
  };

  const logout = async () => {
    removeToken();
    removePermissions();
  };

  return {
    login, logout, loading, error,
  };
};

export default useAuthenticationService;
