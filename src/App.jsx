import { useState } from "react";
import axios from "axios";

import AuthMail from "./AuthMail";


// export const changeActions = async (props) => {
//   console.log('props', props);

//   try {
//     const response = await axios.get("https://hotpal.ru/api/base/vendor/actions.php", {
//       params: props
//     });
//     console.log('Ответ php', response);


const App = () => {

  const [newState, setNewStage] = useState('1');

  const loginUser = async () => {
    // GOOD
    // const response = await axios.post("/wp-json/jwt-auth/v1/token", {
    //   username: 'user',
    //   password: 'user',
    // });

    // console.log('Ответ token', response.data.token);
    // console.log('Ответ nicename', response.data.user_nicename);
    // console.log('Ответ email', response.data.user_email);
    // console.log('Ответ id', response.data.id);

    // const create = await axios.post('/wp-json/wp/v2/posts', {
    //   title: 'Post From React T',
    //   content: 'Post From React C',
    //   status: 'publish'
    // },
    //   {
    //     headers: {
    //       'Content-Type': 'application/json',
    //       'Authorization': `Bearer ${response.data.token}`
    //     }
    //   }
    // );

    // console.log('create', create);
    // GOOD

    const response = await axios.post("/wp-json/adeapi/v1/add_user_api");

    console.log('Ответ token', response);

    // adeapi / v1
  }


  const testClick = () => {
    // setNewStage(2);

    loginUser();

  }

  return (
    <div className="App">
      <AuthMail />
      Start App: {newState}
      <div className="btn btn--blue" onClick={testClick}>+</div>
    </div>
  );
}


export default App;
