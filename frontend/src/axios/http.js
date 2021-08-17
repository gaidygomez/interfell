import http from './api'

http.interceptors.request.use(
    config => {
        let accessToken = localStorage.getItem('token');
        if (accessToken) {
            config.headers = Object.assign({
                Authorization: `Bearer ${accessToken}`
            }, config.headers);
        }
        return config;
    },
    error => {
        return Promise.reject(error);
    }
);

http.interceptors.response.use(
    response => {
      if (response.status === 200 || response.status === 201) {
        return Promise.resolve(response);
      } else {
        return Promise.reject(response);
      }
})