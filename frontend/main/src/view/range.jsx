import React, { useState, useEffect } from "react";
import './view.css';
import 'typeface-montserrat';


const apiUrl = "http://localhost/tugas-besar-pirdas/backend/getdata.php";

const HumidityCard = () => {
  const [humidityData, setHumidityData] = useState("");

  const fetchData = async () => {
    try {
      const response = await fetch(apiUrl);
      const data = await response.json();
      setHumidityData(data);
    } catch (error) {
      console.error("Error fetching data:", error);
    }
  };

  useEffect(() => {
    fetchData();
    const interval = setInterval(fetchData, 1000);
    return () => clearInterval(interval);
  }, []);

  return (
      <div id="card" class="max-w-sm rounded-md mt-8 ml-8">
        {/* <img class="w-full" src="/img/card-top.jpg" alt="Sunset in the mountains"></img> */}
        <div className="px-6 py-4">
          <div class="font-sans font-bold text-3xl mb-2 text-start border-b-2 border-black text-black pb-3 ">Distance <span id="truck">🚚 🚙</span></div>
          <p class="text-black-200 text-3xl text-center pt-3">{`${humidityData}`}</p>
        </div>
        <div class="px-6 pt-4 pb-2">
          {/* <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">Arduinoo</span> */}
        </div>
      </div>
  );
};

export default HumidityCard;
