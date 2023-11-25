import axios from 'axios';

const useTokenService = () => {
  const storeToken = (token) => {
    sessionStorage.setItem('token', token);
    axios.defaults.headers.common.Authorization = `Bearer ${token}`;
  };

  const retrieveToken = () => sessionStorage.getItem('token');

  const removeToken = () => {
    sessionStorage.removeItem('token');
    axios.defaults.headers.common.Authorization = null;
  };

  return { storeToken, retrieveToken, removeToken };
};

export default useTokenService;
