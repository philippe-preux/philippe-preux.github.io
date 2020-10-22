1. Title: Tropical Cyclones Dataset in the Atlantic Basin from 1982-2012

2. Sources:
     (a) Creator: Michael Hahsler (using SHIPS training data and SHIPS
     	provided by Mark DeMaria)
     (b) Donor: Hadil Shaiba, Michael Hahsler
     (c) Date: November 17, 2014


3. Citation Request
H. Shaiba and M. Hahsler, "An Experimental Comparison of Different Classifiers
for Predicting Tropical Cyclone Rapid Intensification Events," in
International Conference on Machine Learning, Electrical and Mechanical
Engineering (ICMLEME'2014), Dubai, 2014.

4. Past Usage:
Vladimir Jovanovic, Margaret H. Dunham, Michael Hahsler, and Yu Su. Evaluating
hurricane intensity prediction techniques in real time. In Third IEEE ICDM
Workshop on Knowledge Discovery from Climate Data, Proceedings of the of the
2011 IEEE International Conference on Data Mining Workshops (ICDMW 2011),
pages 23-29. IEEE, December 2011.

J. Kaplan, M. DeMaria and J. A. Knaff, "A Revised Tropical Cyclone Rapid
Intensification Index for the Atlantic and Eastern North Pacific Basins,"
Weather and Forecasting, vol. 25, no. 1, pp. 220-241, 2010. 

M. DeMaria, M. Mainelli, L. Shay, J. A. Knaff and J. Kaplan, "Further
Improvements to the Statistical Hurricane Intensity Prediction Scheme
(SHIPS)," Weather and Forecasting, vol. 20, no. 4, pp. 531-543, 2005. 
  
5. Relevant Information:
This dataset is used by Statistical Hurricane Intensity Prediction Scheme
(SHIPS) for 24-h predictions and Rapid Intensification Index (RII) models, two models used
operationally by the National Hurricane Center.  SHIPS predicts the intensity
of the TC several days ahead whereas RII index predicts the probability of a
rapid intensification will take place within the next 24 hours. The intensity
of the storm is measured by its maximum wind speed whereas rapid
intensification is defined as the rapid increase in intensity within 24 hours
that exceeds 30, 35, or 40 knots. 

Predicted attribute: the dataset can be used to predict the intensity of a TC
in 24 hours or classify data points into Rapid intensification
(RI) or non-rapid intensification (NRI).

6. Number of Instances: 9926

7. Number of Attributes: 50

8. Attribute Information:
   1. ID: the first two characters "AL" represent the Atlantic basin, the second two characters represent the sequence number of a TC in a certain year, and the remaining four characters represent the year when the TC happened  
   2. DATE: a 6-hour time interval represented as follows: "yymmdd". Where the first two digits represent the year, the second two digits represent the month, and the last two digits represent the day of a TC. 
   3. TIME: the current UTC time interval related to a given
record in hours. Once a TC take place, data points
are produced every 6 hours starting from time 0
which means that this predictor will have one of
the following vales: 0, 6, 12 or 18. 
   4. LAT: latitude in 1/10 degrees North of the center of a
TC
   5. LON: longitude in 1=10 degrees West of the center of the
TC
   6. VMAX: TC's maximum intensity in knots
   7. PER: (presistance) previous 12-h change in VMAX **
   8. ADAY: a Gussian function of the day of year when a current hurricane took place (jdate) relative to the peak day of the Atlantic hurricane season (day 253). Transformation: exp((jdate-253)^2/900) 
   9. SPDX: zonal component of initial storm motion which refers to the horizontal direction of the persistence over the sea surface. SPDX positive value represents the horizontal wind movement from West to East and its value represents its wind speed in knots
   10. PSLV: vertical depth
   11. VPER: VMAX times PER
   12. PC20: a channel 4 GOES predictor that returns the percentage of area covered by cold-cloud top brightness temperature <= -20 degree Celsius
   13. GSTD: VMAX times the standard deviation of PC20
   14. POT: the estimated maximum potential intensity (MPI) that is averaged over the TC's track minus VMAX at time t=0 
   15. SHDC: 850 millibar shear magnitude with vortex removed and averaged from 0-500 km
   16. T200: 200 millibar temperature averaged from 0-1000 km of storm center
   17. T25oP: 250 millibar temperature average from 0-1000 km of storm center
   18. EPOS: average theta difference between a parcel lifted from the surface and its environment averaged from 200-800km
   19. RHMD: 700-500 millibar relative humidity (%) averaged from 200-800 km
   20. TWAT: GFS model mean tangential wind
   21. Z850: 850 millibar absolute vorticity
   22. D200: 200 millibar divergence
   23. LSHDC: SHDC x sin(LAT)
   24. VSHDC: SHDC x VMAX
   25. POT2: (POT)2
   26. RHCN: ocean heat content from satellite altimetry data (KJ/cm2)
   27. SDIR: reference direction for shear direction predictor (sdp)
   28. SHGC: 850-200 millibar shear magnitude (kt*10) with vortex removed and averaged from 0-500 km
   29. POT_AVG: same as POT with values averaged from time t=0 to t=24 h **
   30. SHDC_AVG: same as SHDC with values averaged from time t=0 to t=24 h
   31. T200_AVG: same as T200 with values averaged from time t=0 to t=24 h
   32. T25oP_AVG: same as T250P  with values averaged from time t=0 to t=24 h
   33. EPOS_AVG: same as  EPOS with values averaged from time t=0 to t=24 h
   34. RHMD_AVG: same as  RHMD with values averaged from time t=0 to t=24 h
   35. TWAT_AVG: same as  TWAT with values averaged from time t=0 to t=24 h
   36. Z850_AVG: same as  Z850 with values averaged from time t=0 to t=24 h 
   37. D200_AVG: same as  D200 with values averaged from time t=0 to t=24 h **
   38. LSHDC_AVG: same as  LSHDC with values averaged from time t=0 to t=24 h
   39. VSHDC_AVG: same as  VSHDC with values averaged from time t=0 to t=24 h
   40. POT2_AVG: same as POT2 with values averaged from time t=0 to t=24 h
   41. RHCN_AVG: same as  RHCN with values averaged from time t=0 to t=24 h **
   42. SDIR_AVG: same as SDIR with values averaged from time t=0 to t=24 h
   43. SHGC_AVG: same as SHGC with values averaged from time t=0 to t=24 h
   44. RHLORI: 850-700 mb relative humidity percentage from 200-800 km radius averaged from time t=0 to t=24 h **
   45. SBTRI: standard deviation of cold cloud-top from 50-200 radius  with a GOES channel 4 	brightness temperature **
   46. PCRI30: percentage area of cold cloud-top from 50-200 radius  with a GOES channel 4 	brightness temperature <= -30 degree c **
   47. RHCRI: Reynold heat content averaged from time t=0 to t=24 h **
   48. RII30: RII model estimate of RI with a 30 knot threshold
   49. RII35: RII model estimate of RI with a 35 knot threshold
   50. RII40: RII model estimate of RI with a 40 knot threshold

** used in RII

9. Missing Attribute Values: yes

Summary Statistics:

        ID            DATE           TIME             LAT       
 AL122002:  88   950827 :  18   Min.   : 0.000   Min.   : 7.20  
 AL032000:  79   950828 :  17   1st Qu.: 6.000   1st Qu.:17.40  
 AL092004:  71   920926 :  16   Median :12.000   Median :24.40  
 AL022008:  69   950829 :  16   Mean   : 9.046   Mean   :24.69  
 AL061996:  66   950830 :  16   3rd Qu.:18.000   3rd Qu.:31.20  
 AL071998:  64   950831 :  16   Max.   :18.000   Max.   :51.90  
 (Other) :9489   (Other):9827                                   
      LON              VMAX             PER               ADAY       
 Min.   :  6.00   Min.   : 10.00   Min.   :-45.000   Min.   :0.0000  
 1st Qu.: 48.90   1st Qu.: 30.00   1st Qu.:  0.000   1st Qu.:0.1845  
 Median : 63.70   Median : 45.00   Median :  0.000   Median :0.6696  
 Mean   : 63.67   Mean   : 52.45   Mean   :  1.706   Mean   :0.5599  
 3rd Qu.: 79.60   3rd Qu.: 65.00   3rd Qu.:  5.000   3rd Qu.:0.9139  
 Max.   :109.30   Max.   :160.00   Max.   : 75.000   Max.   :1.0000  
                                                                     
      SPDX              PSLV             VPER              PC20    
 Min.   :-29.000   Min.   : 246.0   Min.   :-4025.0   Min.   :  0  
 1st Qu.: -9.403   1st Qu.: 565.0   1st Qu.:    0.0   1st Qu.: 39  
 Median : -3.886   Median : 622.0   Median :    0.0   Median : 62  
 Mean   : -2.847   Mean   : 624.1   Mean   :  129.3   Mean   : 61  
 3rd Qu.:  2.419   3rd Qu.: 680.0   3rd Qu.:  275.0   3rd Qu.: 88  
 Max.   : 48.034   Max.   :1124.0   Max.   :11250.0   Max.   :100  
                                                                   
      GSTD             POT              SHDC            T200       
 Min.   :   0.0   Min.   :-30.14   Min.   : 0.50   Min.   :-60.90  
 1st Qu.: 510.0   1st Qu.: 43.34   1st Qu.: 9.70   1st Qu.:-53.95  
 Median : 714.0   Median : 72.52   Median :15.50   Median :-52.95  
 Mean   : 765.4   Mean   : 69.13   Mean   :17.48   Mean   :-53.02  
 3rd Qu.: 968.0   3rd Qu.: 95.24   3rd Qu.:22.85   3rd Qu.:-52.00  
 Max.   :2822.0   Max.   :151.62   Max.   :74.50   Max.   :-45.70  
                                                                   
     T250P              EPOS            RHMD            TWAT        
 Min.   :-8.0000   Min.   : 0.00   Min.   :19.50   Min.   :-6.0000  
 1st Qu.: 0.0000   1st Qu.: 8.10   1st Qu.:44.50   1st Qu.:-0.3000  
 Median : 0.0000   Median :10.75   Median :51.50   Median : 0.0000  
 Mean   :-0.2602   Mean   :10.37   Mean   :52.09   Mean   : 0.0588  
 3rd Qu.: 0.0000   3rd Qu.:12.95   3rd Qu.:59.50   3rd Qu.: 0.4000  
 Max.   : 0.0000   Max.   :22.35   Max.   :85.50   Max.   : 7.9000  
                                                                    
      Z850              D200           LSHDC             VSHDC       
 Min.   :-162.50   Min.   :-95.0   Min.   : 0.2245   Min.   :  20.0  
 1st Qu.: -13.50   1st Qu.:  5.0   1st Qu.: 3.3615   1st Qu.: 419.4  
 Median :  21.50   Median : 24.0   Median : 6.0161   Median : 715.8  
 Mean   :  24.54   Mean   : 27.3   Mean   : 7.7257   Mean   : 890.6  
 3rd Qu.:  61.50   3rd Qu.: 46.5   3rd Qu.:10.3018   3rd Qu.:1185.0  
 Max.   : 278.00   Max.   :205.0   Max.   :54.5737   Max.   :5960.0  
                                                                     
      POT2            RHCN            SDIR              SHGC          
 Min.   :    0   Min.   : 0.00   Min.   :-86.375   Min.   :-14.00220  
 1st Qu.: 1878   1st Qu.: 0.00   1st Qu.:-21.433   1st Qu.: -2.64351  
 Median : 5260   Median : 0.00   Median :  1.046   Median : -0.36231  
 Mean   : 5873   Mean   : 3.69   Mean   :  1.478   Mean   :  0.08606  
 3rd Qu.: 9070   3rd Qu.: 0.00   3rd Qu.: 25.144   3rd Qu.:  2.42846  
 Max.   :22988   Max.   :94.00   Max.   : 86.591   Max.   : 20.14803  
                                                                      
    POT_AVG          SHDC_AVG        T200_AVG        T250P_AVG      
 Min.   :-36.23   Min.   : 0.80   Min.   :-60.62   Min.   :-8.0000  
 1st Qu.: 41.45   1st Qu.:10.42   1st Qu.:-53.92   1st Qu.: 0.0000  
 Median : 71.03   Median :15.98   Median :-52.93   Median : 0.0000  
 Mean   : 67.70   Mean   :18.19   Mean   :-53.00   Mean   :-0.2662  
 3rd Qu.: 94.53   3rd Qu.:23.56   3rd Qu.:-52.00   3rd Qu.: 0.0000  
 Max.   :148.90   Max.   :74.50   Max.   :-45.70   Max.   : 0.0000  
                                                                    
    EPOS_AVG        RHMD_AVG        TWAT_AVG          Z850_AVG      
 Min.   : 0.00   Min.   :19.50   Min.   :-8.8000   Min.   :-144.00  
 1st Qu.: 7.86   1st Qu.:44.62   1st Qu.:-0.5000   1st Qu.: -13.00  
 Median :10.64   Median :51.00   Median : 0.0000   Median :  20.40  
 Mean   :10.16   Mean   :51.84   Mean   : 0.1835   Mean   :  24.24  
 3rd Qu.:12.90   3rd Qu.:59.00   3rd Qu.: 0.9000   3rd Qu.:  60.24  
 Max.   :21.70   Max.   :85.50   Max.   :11.0000   Max.   : 278.00  
                                                                    
    D200_AVG        LSHDC_AVG         VSHDC_AVG         POT2_AVG        
 Min.   :-95.00   Min.   : 0.3712   Min.   :  20.0   Min.   :    0.002  
 1st Qu.:  6.00   1st Qu.: 3.7412   1st Qu.: 448.0   1st Qu.: 1717.876  
 Median : 24.20   Median : 6.4337   Median : 748.2   Median : 5045.373  
 Mean   : 27.60   Mean   : 8.2574   Mean   : 934.2   Mean   : 5712.344  
 3rd Qu.: 45.67   3rd Qu.:10.8687   3rd Qu.:1232.0   3rd Qu.: 8936.095  
 Max.   :205.00   Max.   :54.5737   Max.   :5960.0   Max.   :22171.158  
                                                                        
    RHCN_AVG         SDIR_AVG          SHGC_AVG            RHLORI     
 Min.   : 0.000   Min.   :-84.355   Min.   :-14.0022   Min.   :27.80  
 1st Qu.: 0.000   1st Qu.:-19.437   1st Qu.: -2.2780   1st Qu.:56.20  
 Median : 0.000   Median :  1.925   Median : -0.2491   Median :64.00  
 Mean   : 3.132   Mean   :  2.192   Mean   :  0.1592   Mean   :63.43  
 3rd Qu.: 0.000   3rd Qu.: 25.021   3rd Qu.:  2.1838   3rd Qu.:70.80  
 Max.   :80.200   Max.   : 80.977   Max.   : 17.3768   Max.   :88.60  
                                                                      
     SBTRI           PCRI30           RHCRI             RII30       
 Min.   : 0.00   Min.   :  0.00   Min.   :  0.000   Min.   : 1.000  
 1st Qu.:10.40   1st Qu.: 32.00   1st Qu.:  2.617   1st Qu.: 3.000  
 Median :15.10   Median : 57.00   Median : 23.000   Median : 3.000  
 Mean   :15.75   Mean   : 56.19   Mean   : 29.570   Mean   : 9.479  
 3rd Qu.:20.50   3rd Qu.: 83.00   3rd Qu.: 49.767   3rd Qu.:14.000  
 Max.   :38.60   Max.   :100.00   Max.   :140.200   Max.   :74.000  
 NA's   :1496    NA's   :1496                       NA's   :1496    
     RII35            RII40       
 Min.   : 0.000   Min.   : 0.000  
 1st Qu.: 1.000   1st Qu.: 1.000  
 Median : 1.000   Median : 1.000  
 Mean   : 4.416   Mean   : 3.045  
 3rd Qu.: 6.000   3rd Qu.: 1.000  
 Max.   :67.000   Max.   :65.000  
 NA's   :1496     NA's   :1496    
